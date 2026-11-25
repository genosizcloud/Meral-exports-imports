<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{SiteSetting, HeroContent, Category, Product, Feature, Stat, ExportCountry, BlogPost};
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MeralExportsSeeder extends Seeder
{
    public function run(): void
    {
        // Seed an admin only when deployment credentials are configured.
        $adminEmail = env('MERAL_ADMIN_EMAIL');
        $adminPassword = env('MERAL_ADMIN_PASSWORD');
        if ($adminEmail && $adminPassword) {
            User::updateOrCreate(['email' => $adminEmail], [
                'name' => 'Admin',
                'password' => Hash::make($adminPassword),
            ]);
        }

        // ── Site Settings ─────────────────────────────────────
        $settings = [
            ['key' => 'company_name',     'value' => 'Meral Exports & Imports Pvt Ltd', 'group' => 'general'],
            ['key' => 'tagline',          'value' => 'Premium Food Exports',              'group' => 'general'],
            ['key' => 'whatsapp_url',     'value' => '#',                                 'group' => 'social'],
            ['key' => 'facebook_url',     'value' => '#',                                 'group' => 'social'],
            ['key' => 'instagram_url',    'value' => '#',                                 'group' => 'social'],
            ['key' => 'footer_tagline',   'value' => 'Your trusted partner for premium quality food exports. From Kerala to the world — delivering freshness, quality and taste in every shipment.', 'group' => 'general'],
            ['key' => 'categories_section_title',   'value' => 'Explore Our Product Range',       'group' => 'sections'],
            ['key' => 'categories_section_subtitle','value' => 'We offer a wide range of premium food products, carefully sourced and quality-checked for global export standards.', 'group' => 'sections'],
            ['key' => 'products_section_title',     'value' => 'Quality You Can Trust',           'group' => 'sections'],
            ['key' => 'products_section_subtitle',  'value' => 'Handpicked products that meet international food safety and quality standards — FSSAI certified, HACCP compliant.', 'group' => 'sections'],
            ['key' => 'whyus_section_title',        'value' => 'Our Promise to You',              'group' => 'sections'],
            ['key' => 'whyus_section_subtitle',     'value' => 'We uphold the highest standards in sourcing, processing and delivering premium food products worldwide.', 'group' => 'sections'],
            ['key' => 'contact_section_title',      'value' => 'Ready to Start Exporting?',       'group' => 'sections'],
            ['key' => 'contact_section_subtitle',   'value' => 'Contact our team for product inquiries, bulk orders, export documentation and shipping quotes.', 'group' => 'sections'],
            ['key' => 'countries_section_label',    'value' => 'Global Reach',                                                                 'group' => 'sections'],
            ['key' => 'countries_section_title',    'value' => 'Countries We Export To',                                                     'group' => 'sections'],
            ['key' => 'countries_section_subtitle', 'value' => 'Our products reach 30+ countries across the Middle East, Europe, Asia, Africa and the Americas.', 'group' => 'sections'],
        ];
        foreach ($settings as $s) SiteSetting::updateOrCreate(['key' => $s['key']], $s);

        // ── Hero Content ──────────────────────────────────────
        HeroContent::updateOrCreate(['id' => 1], [
            'badge_text'         => 'Trusted Worldwide Food Exporter',
            'title_line1'        => 'Delivering',
            'title_highlight'    => 'Premium',
            'title_line2'        => 'Quality Food',
            'title_line3'        => 'Across the Globe',
            'subtitle'           => '',
            'btn_primary_text'   => 'Explore Products',
            'btn_secondary_text' => 'Get in Touch',
            'stat1_number'       => '500',
            'stat1_label'        => 'Products',
            'stat2_number'       => '30',
            'stat2_label'        => 'Countries',
            'stat3_number'       => '15',
            'stat3_label'        => 'Years Exp.',
        ]);

        // ── Categories ────────────────────────────────────────
        $categories = [
            ['name'=>'Rice Varieties',    'slug'=>'rice',    'description'=>'Premium Basmati, Sona Masoori, Matta Rice, Ponni Rice and more — sourced from the finest paddy fields.', 'emoji'=>'🌾', 'tag_label'=>'10+ Varieties', 'sort_order'=>1],
            ['name'=>'Frozen Foods',      'slug'=>'frozen',  'description'=>'IQF vegetables, frozen parathas, samosas, spring rolls and ready-to-cook frozen meals.',                'emoji'=>'🧊', 'tag_label'=>'25+ Products',  'sort_order'=>2],
            ['name'=>'Pulses & Lentils',  'slug'=>'pulses',  'description'=>'Green moong, red lentils, chickpeas, black-eyed peas, urad dal and many more wholesome varieties.',     'emoji'=>'🫘', 'tag_label'=>'15+ Varieties', 'sort_order'=>3],
            ['name'=>'Snacks & Namkeen',  'slug'=>'snacks',  'description'=>'Crispy murukku, banana chips, mix namkeen, chakli, roasted nuts and traditional Kerala snacks.',        'emoji'=>'🍿', 'tag_label'=>'30+ Products',  'sort_order'=>4],
            ['name'=>'Groceries',         'slug'=>'grocery', 'description'=>'Spices, coconut oil, pickles, chutneys, flours, edible oils and premium Indian kitchen staples.',      'emoji'=>'🛒', 'tag_label'=>'50+ Products',  'sort_order'=>5],
            ['name'=>'Frozen & Fresh Fish','slug'=>'fish',   'description'=>"Pomfret, kingfish, prawns, tilapia, sardines and fresh catch from Kerala's coastal waters.",            'emoji'=>'🐟', 'tag_label'=>'20+ Varieties', 'sort_order'=>6],
        ];
        foreach ($categories as $c) Category::updateOrCreate(['slug' => $c['slug']], $c);

        // ── Products ──────────────────────────────────────────
        $products = [
            // Rice
            ['slug'=>'rice', 'name'=>'Basmati Rice (Extra Long)', 'description'=>'Premium aged extra long grain basmati. Fragrant & fluffy texture.', 'emoji'=>'🌾', 'badge_text'=>'Export Grade', 'badge_type'=>'green', 'bg_from'=>'#fff8e1','bg_to'=>'#ffecb3', 'sort_order'=>1],
            ['slug'=>'rice', 'name'=>'Sona Masoori Rice',         'description'=>'Light, aromatic medium grain rice. Perfect for daily cooking.',        'emoji'=>'🍚', 'badge_text'=>'Fresh Stock',  'badge_type'=>'green', 'bg_from'=>'#fce4ec','bg_to'=>'#f8bbd0', 'sort_order'=>2],
            ['slug'=>'rice', 'name'=>'Matta Rice (Kerala Red Rice)','description'=>'Traditional Kerala red parboiled rice, rich in fibre and nutrients.', 'emoji'=>'🌾', 'badge_text'=>'Organic',     'badge_type'=>'green', 'bg_from'=>'#e8f5e9','bg_to'=>'#c8e6c9', 'sort_order'=>3],
            ['slug'=>'rice', 'name'=>'Ponni Rice',                 'description'=>'South Indian favourite, soft and smooth cooked texture.',              'emoji'=>'🍙', 'badge_text'=>'Premium',     'badge_type'=>'orange','bg_from'=>'#fff3e0','bg_to'=>'#ffe0b2', 'sort_order'=>4],
            // Frozen
            ['slug'=>'frozen','name'=>'Frozen Samosa',           'description'=>'Ready-to-fry crispy samosas with spiced potato filling.',              'emoji'=>'🥟', 'badge_text'=>'Frozen',       'badge_type'=>'blue',  'bg_from'=>'#e3f2fd','bg_to'=>'#bbdefb', 'sort_order'=>1],
            ['slug'=>'frozen','name'=>'IQF Mixed Vegetables',    'description'=>'Individually quick frozen mixed vegetables. No preservatives.',        'emoji'=>'🥬', 'badge_text'=>'Frozen',       'badge_type'=>'blue',  'bg_from'=>'#e3f2fd','bg_to'=>'#bbdefb', 'sort_order'=>2],
            ['slug'=>'frozen','name'=>'Frozen Paratha',          'description'=>'Flaky, layered Malabar-style parathas. Ready in 3 minutes.',           'emoji'=>'🫓', 'badge_text'=>'Ready to Cook','badge_type'=>'blue',  'bg_from'=>'#e3f2fd','bg_to'=>'#bbdefb', 'sort_order'=>3],
            ['slug'=>'frozen','name'=>'Frozen Prawns (IQF)',     'description'=>'Individually frozen deveined prawns, export quality.',                 'emoji'=>'🍤', 'badge_text'=>'Seafood',      'badge_type'=>'blue',  'bg_from'=>'#e3f2fd','bg_to'=>'#bbdefb', 'sort_order'=>4],
            // Pulses
            ['slug'=>'pulses','name'=>'Red Lentils (Masoor Dal)','description'=>'Split red lentils, clean, sorted and packed for export.',              'emoji'=>'🔴', 'badge_text'=>'Protein Rich', 'badge_type'=>'green', 'bg_from'=>'#fce4ec','bg_to'=>'#f8bbd0', 'sort_order'=>1],
            ['slug'=>'pulses','name'=>'Green Moong Dal',         'description'=>'Whole green moong beans, rich in protein and fibre.',                  'emoji'=>'🟢', 'badge_text'=>'Organic',      'badge_type'=>'green', 'bg_from'=>'#f1f8e9','bg_to'=>'#dcedc8', 'sort_order'=>2],
            ['slug'=>'pulses','name'=>'Chana Dal (Chickpea)',    'description'=>'Premium split chickpeas, polished and machine cleaned.',               'emoji'=>'🟡', 'badge_text'=>'Export Grade', 'badge_type'=>'orange','bg_from'=>'#fff8e1','bg_to'=>'#ffecb3', 'sort_order'=>3],
            ['slug'=>'pulses','name'=>'Black Urad Dal',          'description'=>'Whole black gram dal, popular for traditional Kerala dishes.',         'emoji'=>'⚫', 'badge_text'=>'Premium',      'badge_type'=>'green', 'bg_from'=>'#fce4ec','bg_to'=>'#f8bbd0', 'sort_order'=>4],
            // Snacks
            ['slug'=>'snacks','name'=>'Kerala Banana Chips',     'description'=>'Crispy coconut oil fried nendran banana chips. Salted & spicy.',       'emoji'=>'🍌', 'badge_text'=>'Traditional',  'badge_type'=>'orange','bg_from'=>'#fff3e0','bg_to'=>'#ffe0b2', 'sort_order'=>1],
            ['slug'=>'snacks','name'=>'Murukku (Chakli)',        'description'=>'Crunchy rice flour murukku, a popular South Indian snack.',             'emoji'=>'🥨', 'badge_text'=>'Crispy',       'badge_type'=>'orange','bg_from'=>'#fff3e0','bg_to'=>'#ffe0b2', 'sort_order'=>2],
            ['slug'=>'snacks','name'=>'Roasted Cashews',         'description'=>'Premium Kerala cashews, roasted and salted. Export quality.',          'emoji'=>'🥜', 'badge_text'=>'Premium',      'badge_type'=>'green', 'bg_from'=>'#fff3e0','bg_to'=>'#ffe0b2', 'sort_order'=>3],
            ['slug'=>'snacks','name'=>'Mix Namkeen',             'description'=>'Crunchy mixed savoury snack blend — a crowd favourite.',               'emoji'=>'🎑', 'badge_text'=>'Bestseller',   'badge_type'=>'orange','bg_from'=>'#fff3e0','bg_to'=>'#ffe0b2', 'sort_order'=>4],
            // Grocery
            ['slug'=>'grocery','name'=>'Virgin Coconut Oil',    'description'=>'Cold-pressed pure Kerala virgin coconut oil. Natural & unrefined.',     'emoji'=>'🥥', 'badge_text'=>'Organic',      'badge_type'=>'green', 'bg_from'=>'#e8f5e9','bg_to'=>'#c8e6c9', 'sort_order'=>1],
            ['slug'=>'grocery','name'=>'Kerala Spice Mix',       'description'=>'Authentic ground spice blends — curry masala, garam masala.',          'emoji'=>'🌶️','badge_text'=>'Authentic',    'badge_type'=>'orange','bg_from'=>'#fff3e0','bg_to'=>'#ffe0b2', 'sort_order'=>2],
            ['slug'=>'grocery','name'=>'Mango Pickle',           'description'=>'Traditional Kerala mango pickle made in sesame oil.',                  'emoji'=>'🍯', 'badge_text'=>'Traditional',  'badge_type'=>'orange','bg_from'=>'#fff3e0','bg_to'=>'#ffe0b2', 'sort_order'=>3],
            ['slug'=>'grocery','name'=>'Rice Flour (Idiyappam)', 'description'=>'Fine stone-ground rice flour for idiyappam, puttu and appam.',         'emoji'=>'🌾', 'badge_text'=>'100% Natural', 'badge_type'=>'green', 'bg_from'=>'#fff8e1','bg_to'=>'#ffecb3', 'sort_order'=>4],
            // Fish
            ['slug'=>'fish','name'=>'Frozen Pomfret',            'description'=>'White pomfret, whole cleaned and IQF frozen. Premium quality.',        'emoji'=>'🐟', 'badge_text'=>'Fresh Catch',  'badge_type'=>'blue',  'bg_from'=>'#e0f7fa','bg_to'=>'#b2ebf2', 'sort_order'=>1],
            ['slug'=>'fish','name'=>'Tiger Prawns',              'description'=>'Large fresh tiger prawns, deveined and export packed.',                'emoji'=>'🦐', 'badge_text'=>'Seafood',      'badge_type'=>'blue',  'bg_from'=>'#e0f7fa','bg_to'=>'#b2ebf2', 'sort_order'=>2],
            ['slug'=>'fish','name'=>'Kingfish (Neimeen)',        'description'=>'Premium Kerala kingfish steaks, cleaned and vacuum packed.',            'emoji'=>'🐠', 'badge_text'=>'Premium',      'badge_type'=>'blue',  'bg_from'=>'#e0f7fa','bg_to'=>'#b2ebf2', 'sort_order'=>3],
            ['slug'=>'fish','name'=>'Sardines (Mathi)',          'description'=>'Fresh Kerala sardines, cleaned and frozen. Rich in Omega-3.',           'emoji'=>'🐡', 'badge_text'=>'Omega-3 Rich', 'badge_type'=>'green', 'bg_from'=>'#e0f7fa','bg_to'=>'#b2ebf2', 'sort_order'=>4],
        ];

        foreach ($products as $p) {
            $cat = Category::where('slug', $p['slug'])->first();
            if (!$cat) continue;
            $data = $p; unset($data['slug']);
            $data['category_id'] = $cat->id;
            Product::updateOrCreate(
                ['category_id' => $cat->id, 'name' => $p['name']],
                $data
            );
        }

        // ── Features ──────────────────────────────────────────
        $features = [
            ['icon'=>'✅', 'title'=>'ISO & FSSAI Certified',  'description'=>'All our products meet international food safety standards with full FSSAI and ISO certifications.', 'sort_order'=>1],
            ['icon'=>'🌿', 'title'=>'Premium Quality',         'description'=>'Handpicked, machine-cleaned and rigorously tested products to ensure you always get the best.',       'sort_order'=>2],
            ['icon'=>'🚢', 'title'=>'Global Shipping',         'description'=>'Reliable exports to 30+ countries with temperature-controlled logistics and on-time delivery.',       'sort_order'=>3],
            ['icon'=>'💬', 'title'=>'Dedicated Support',       'description'=>'Our expert team provides personalised support from inquiry to delivery, ensuring your satisfaction.',  'sort_order'=>4],
        ];
        foreach ($features as $f) Feature::updateOrCreate(['title' => $f['title']], $f);

        // ── Stats ─────────────────────────────────────────────
        $stats = [
            ['value'=>15,    'suffix'=>'+', 'label'=>'Years of Experience', 'sort_order'=>1],
            ['value'=>500,   'suffix'=>'+', 'label'=>'Products Available',  'sort_order'=>2],
            ['value'=>30,    'suffix'=>'+', 'label'=>'Countries Served',    'sort_order'=>3],
            ['value'=>10000, 'suffix'=>'+', 'label'=>'Happy Clients',       'sort_order'=>4],
        ];
        foreach ($stats as $s) Stat::updateOrCreate(['label' => $s['label']], $s);

        // ── Export Countries ──────────────────────────────────
        $exportCountries = [
            ['name' => 'UAE',           'flag_emoji' => '🇦🇪', 'sort_order' => 1],
            ['name' => 'Saudi Arabia',  'flag_emoji' => '🇸🇦', 'sort_order' => 2],
            ['name' => 'Qatar',         'flag_emoji' => '🇶🇦', 'sort_order' => 3],
            ['name' => 'Kuwait',        'flag_emoji' => '🇰🇼', 'sort_order' => 4],
            ['name' => 'Bahrain',       'flag_emoji' => '🇧🇭', 'sort_order' => 5],
            ['name' => 'Oman',          'flag_emoji' => '🇴🇲', 'sort_order' => 6],
            ['name' => 'UK',            'flag_emoji' => '🇬🇧', 'sort_order' => 7],
            ['name' => 'Germany',       'flag_emoji' => '🇩🇪', 'sort_order' => 8],
            ['name' => 'France',        'flag_emoji' => '🇫🇷', 'sort_order' => 9],
            ['name' => 'Italy',         'flag_emoji' => '🇮🇹', 'sort_order' => 10],
            ['name' => 'Netherlands',   'flag_emoji' => '🇳🇱', 'sort_order' => 11],
            ['name' => 'Singapore',     'flag_emoji' => '🇸🇬', 'sort_order' => 12],
            ['name' => 'Malaysia',      'flag_emoji' => '🇲🇾', 'sort_order' => 13],
            ['name' => 'Australia',     'flag_emoji' => '🇦🇺', 'sort_order' => 14],
            ['name' => 'Canada',        'flag_emoji' => '🇨🇦', 'sort_order' => 15],
            ['name' => 'USA',           'flag_emoji' => '🇺🇸', 'sort_order' => 16],
            ['name' => 'Kenya',         'flag_emoji' => '🇰🇪', 'sort_order' => 17],
            ['name' => 'South Africa',  'flag_emoji' => '🇿🇦', 'sort_order' => 18],
        ];
        foreach ($exportCountries as $c) {
            ExportCountry::updateOrCreate(['name' => $c['name']], $c + ['is_active' => true]);
        }

        // ── Blog posts ────────────────────────────────────────
        $blogPosts = [
            [
                'title'        => 'Why Kerala Spices Are Sought Worldwide',
                'slug'         => 'why-kerala-spices-are-sought-worldwide',
                'excerpt'      => 'From cardamom hills to global kitchens – discover what makes Kerala spices a premium export commodity.',
                'content'      => '<p>Kerala has long been known as the spice garden of India. The unique climate, rich soil and traditional farming methods produce spices with exceptional aroma and potency.</p><p>At Meral Exports, we source directly from trusted farmers and process under strict quality controls before export. Our cardamom, pepper and turmeric consistently meet international standards for moisture, colour and essential oil content.</p><p>Whether you are a wholesaler in the Middle East or a retailer in Europe, Kerala spices offer consistent quality that builds customer loyalty.</p>',
                'author'       => 'Meral Exports',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title'        => 'Export Documentation: A Quick Guide for Food Importers',
                'slug'         => 'export-documentation-guide-food-importers',
                'excerpt'      => 'Understanding certificates, phytosanitary requirements and customs paperwork for smooth food imports.',
                'content'      => '<p>Importing food products requires careful attention to documentation. Key documents typically include the commercial invoice, packing list, bill of lading, certificate of origin and phytosanitary certificate where applicable.</p><p>Meral Exports prepares all export documentation in line with destination country requirements. Our team coordinates with customs brokers and shipping lines to ensure your cargo clears without delays.</p><p>Contact us for a tailored checklist based on your country and product category.</p>',
                'author'       => 'Meral Exports',
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title'        => 'Frozen Seafood Exports: Quality From Port to Plate',
                'slug'         => 'frozen-seafood-exports-quality',
                'excerpt'      => 'How temperature-controlled logistics preserve freshness in our frozen fish and seafood export operations.',
                'content'      => '<p>Frozen seafood exports demand precision at every stage – harvesting, blast freezing, cold storage and refrigerated transport. A break in the cold chain can compromise product quality and safety.</p><p>We partner with certified processing units that follow HACCP and EU standards. Each shipment is traceable, and we maintain temperature logs throughout transit.</p><p>Our clients across the Gulf and Southeast Asia rely on us for consistent supply of premium frozen seafood products.</p>',
                'author'       => 'Meral Exports',
                'is_published' => true,
                'published_at' => now()->subDays(20),
            ],
        ];
        foreach ($blogPosts as $b) {
            BlogPost::updateOrCreate(['slug' => $b['slug']], $b);
        }
    }
}
