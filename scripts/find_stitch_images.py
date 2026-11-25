import os
import json
import re
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

images_found = {}

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
        alt = img.get("alt", "")
        orig = img.get("data-stitch-original-src", "")
        if src.startswith("http"):
            if src not in images_found:
                images_found[src] = []
            images_found[src].append({
                "screen": screen_name,
                "alt": alt,
                "orig": orig
            })

print(f"Total unique web images found: {len(images_found)}")
for i, (src, usages) in enumerate(images_found.items()):
    screens = ", ".join(set(u["screen"] for u in usages))
    alts = ", ".join(set(u["alt"] for u in usages if u["alt"]))
    origs = ", ".join(set(u["orig"] for u in usages if u["orig"]))
    print(f"[{i+1}] Screens: {screens} | Alt: {alts} | Orig: {origs}")
