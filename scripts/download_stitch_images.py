import os
import json
import urllib.request
from bs4 import BeautifulSoup

base_dir = r"C:\Users\ASUS\.gemini\antigravity\brain\5a808d1c-e207-4616-a115-8001d2297695\.system_generated\steps"
dest_dir = r"c:\Users\ASUS\Downloads\meral export web\public\images\stitch"
os.makedirs(dest_dir, exist_ok=True)

steps = {
    "Home": 349,
    "3D_Globe": 345,
    "About": 399,
    "Services": 401,
    "Products": 403,
    "Product_Detail": 405,
    "Gallery": 407,
    "Blog": 409,
    "Contact": 411
}

# Mapping of Stitch original src basename to local filename
mapping = {
    "product_black_pepper.jpg": "product_black_pepper.jpg",
    "product_basmati_rice.jpg": "product_basmati_rice.jpg",
    "cat_spices.jpg": "cat_spices.jpg",
    "cat_grains.jpg": "cat_grains.jpg",
    "cat_pulses.jpg": "cat_pulses.jpg",
    "cat_oils.jpg": "cat_oils.jpg",
    "shipping_logistics_port.jpg": "shipping_logistics_port.jpg",
    "facility_quality_lab.jpg": "facility_quality_lab.jpg",
    "product_cardamom.jpg": "product_cardamom.jpg",
    "hero_spices_grains.jpg": "hero_spices_grains.jpg",
    "elegant-meral-group-monogram-logo-63d2db.png": "meral_monogram.png",
    "10-36c0a6.png": "meral_stitch_logo.png"
}

images_to_download = {}

for screen_name, step_num in steps.items():
    file_path = os.path.join(base_dir, str(step_num), "output.txt")
    if not os.path.exists(file_path):
        continue
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()
    try:
        data = json.loads(content)
        html = data.get("html", "")
    except Exception:
        html = content

    soup = BeautifulSoup(html, "html.parser")
    for img in soup.find_all("img"):
        src = img.get("src", "")
        orig = img.get("data-stitch-original-src", "")
        if src.startswith("http") and "googleusercontent.com" in src:
            target_name = None
            for key, val in mapping.items():
                if key in orig:
                    target_name = val
                    break
            if not target_name:
                # generate filename based on alt or hash
                alt = img.get("alt", "image").lower().replace(" ", "_")
                alt = "".join(c for c in alt if c.isalnum() or c == "_")
                target_name = f"{alt}.jpg"
            images_to_download[src] = target_name

print(f"Downloading {len(images_to_download)} images...")
headers = {'User-Agent': 'Mozilla/5.0'}
for url, filename in images_to_download.items():
    dest_path = os.path.join(dest_dir, filename)
    req = urllib.request.Request(url, headers=headers)
    try:
        with urllib.request.urlopen(req) as resp, open(dest_path, "wb") as out:
            out.write(resp.read())
        print(f"Downloaded: {filename} ({os.path.getsize(dest_path)} bytes)")
    except Exception as e:
        print(f"Failed to download {filename}: {e}")

