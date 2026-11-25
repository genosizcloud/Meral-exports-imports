# Design System: Meral Exports & Imports

## 1. Visual Theme & Atmosphere

Design for Meral Exports & Imports Pvt Ltd, a Kerala-based food export and import business serving international wholesale buyers, distributors, and food-service partners. The interface should feel rooted in agricultural provenance and dependable global trade: editorial warmth, disciplined information, and product photography with room to breathe.

- **Density:** 5/10 for public pages; 8/10 for procurement specifications and admin screens.
- **Variance:** 6/10. Use a confident left-aligned editorial hero and occasional offset image/text sections; keep navigation, product data, and forms predictable.
- **Motion:** 3/10. Calm, brief feedback supports trust and task clarity.
- Keep food, origin, quality, and export logistics as the visual story. Avoid decorative motifs that compete with real product photography or verified trade information.

## 2. Color Palette & Roles

Use one consistent warm-neutral surface family, deep forest as the brand foundation, and antique gold as the sole accent. Gold is for calls to action, active markers, and verified highlights; do not add other competing accent hues.

- **Forest Green** (`#0E382B`) — Brand primary, navigation, primary buttons, and strong section backgrounds.
- **Deep Forest** (`#08241B`) — Dark hero overlays and deepest green surfaces; never use pure black.
- **Pine Green** (`#1C4E3D`) — Supporting brand surface and secondary emphasis, not a second accent.
- **Antique Gold** (`#9C7428`) — Single accent for primary highlights, active states, small rules, and badges. Use the lighter gold (`#DFBE7E`) on dark backgrounds when contrast requires it.
- **Warm Ivory** (`#FAF8F5`) — Main warm page surface.
- **Soft Linen** (`#F7F5F0`) — Alternating sections and quiet containers.
- **White** (`#FFFFFF`) — Form fields and clean content surfaces.
- **Charcoal Ink** (`#19211E`) — Main text on light backgrounds.
- **Muted Green Gray** (`#5A6863`) — Secondary copy and metadata on light backgrounds.
- **Warm Border** (`#E3DDD2`) — Dividers, input outlines, and restrained card boundaries.
- On forest backgrounds, use white for primary text and white at sufficient opacity for supporting text. Check contrast for every text/background pairing; do not use gold for small body copy on ivory.

Avoid purple/blue neon, extra saturated accents, pure black, and palette drift between cool and warm grays.

## 3. Typography Rules

The current site uses Oswald throughout. For new Stitch screens, keep the existing recognizable condensed character for headlines while improving long-form readability with a restrained sans-serif pairing.

- **Display and headlines:** Oswald, weight 500–700; compact line-height and controlled tracking. Use for page titles, category headings, and short promotional statements.
- **Body and interface:** Albert Sans, weight 400–600; relaxed line-height for descriptions, product details, forms, and navigation. Use a readable fallback such as Arial, sans-serif.
- **Data:** Albert Sans with tabular numerals; use a monospace face only for code-like identifiers when it improves scanning.
- **Scale:** Eyebrow 0.72–0.8rem; body 0.95–1.125rem; section title `clamp(1.8rem, 3.2vw, 2.8rem)`; page display `clamp(2.4rem, 6vw, 4.8rem)`.
- Keep paragraphs near 65 characters per line, body text at least 1rem on mobile, and use weight and color to establish hierarchy instead of oversized type.
- Do not use Inter, generic system fonts as the visual identity, or decorative serif fonts. Keep display and body families consistent across a screen.

## 4. Component Stylings

- **Primary buttons:** Forest fill with white label; minimum 44px height; 6–8px radius; concise action label such as “Request a Quote.” Hover darkens the fill; active state presses down by 1px. No glow.
- **Secondary buttons:** Transparent or white surface with a clear forest or white outline suited to the background. Keep one dominant primary action per decision area.
- **Navigation:** White or ivory surface with a fine warm divider. Keep links legible and the quote/contact action distinct. Collapse to an accessible mobile menu.
- **Product and category tiles:** Let real product imagery lead. Use consistent image ratios and crop rules, restrained border/shadow, clear category and product names, and a direct path to details or inquiry. Use elevation only when it communicates grouping or clickability.
- **Specification panels and tables:** Prefer aligned labels, values, and quiet dividers over ornamental cards. Keep units and export terms explicit; never invent certifications, quantities, or origin claims.
- **Inputs:** Label above field, visible border, clear focus outline, and inline error below. Use comfortable control height and full-width fields on narrow screens. Keep helper text close to its field.
- **Badges:** Small, restrained status labels. Reserve gold for a verified highlight; do not imply a certification or quality grade without supplied data.
- **Loading and empty states:** Use layout-matched skeletons or a concise explanation with a useful next action; avoid indefinite spinners and decorative filler.
- **Icons:** Simple consistent line icons. Do not use emoji as interface icons; product emoji present in legacy content should be replaced with product imagery in new screens.

## 5. Layout Principles

- Use a centered content grid with a maximum width around 1280–1320px and 24–32px desktop gutters. Reduce outer padding to about 20px on mobile.
- Build the public hero as a left-aligned split between concise copy and a strong, authentic food/export image, or use a full-bleed image with a deep-green overlay and a clearly bounded text column. Keep all text in its own readable zone.
- Vary section composition with image/text alternation, grouped product collections, and editorial proof points. Do not repeat identical three-card rows as the default for every section.
- Use spacing steps of 4, 8, 16, 24, and 32px; public section gaps typically 56–96px. Admin surfaces may be denser but must retain clear row separation.
- Product grids may use 2–4 columns as content and viewport permit. Product specifications should use a clear two-column label/value layout on wide screens and stack on mobile.
- Align text and controls to a shared grid. Avoid overlapping content, arbitrary absolute-positioned labels, and percentage-based layout hacks.
- Preserve clear content hierarchy: origin and product, relevant quality/specification details, then inquiry action. Use only claims that are supported by project content.

## 6. Responsive Behavior

- Design mobile-first. At widths below 768px, collapse multi-column content to a single column unless a compact, readable data pattern is clearly better.
- Prevent horizontal page overflow. Tables may use a purpose-built compact layout or a clearly contained scroll region when necessary.
- Scale display type with `clamp()` and maintain readable line lengths. Keep all interactive targets at least 44×44px.
- Stack hero actions when needed, preserve image subjects with deliberate mobile crop positions, and expose the mobile navigation with keyboard and screen-reader accessible controls.
- Respect safe-area insets and use dynamic viewport sizing for full-height sections.

## 7. Motion & Interaction

Use brief, purposeful motion: 150–200ms for state changes and up to 300ms for entrances, with ease-out or a restrained deceleration curve. Animate opacity and transforms only. Buttons may press by 1px; product tiles may lift slightly when interactive. Avoid perpetual motion, bouncing, cursor effects, and animation that delays access to content. Honor `prefers-reduced-motion` by removing nonessential transitions and entrance effects. Provide visible keyboard focus and hover, active, disabled, success, and error states.

## 8. Content & Imagery

- Write in a precise, calm, trade-aware voice for procurement professionals.
- Prefer concrete labels such as “Explore Products,” “Request a Quote,” and “View Specifications.” Explain relevant units and trade terms where needed.
- Use authentic, well-lit product, sourcing, packing, and logistics photography. Maintain consistent crop and image treatment; never rely on broken external image URLs.
- Use supplied company, product, and export information. Do not fabricate statistics, countries served, certifications, customer logos, or quality guarantees.

## 9. Anti-Patterns (Banned)

- No purple or blue neon palettes, glowing buttons, or oversaturated accent colors.
- No pure-black backgrounds or text; use deep forest and charcoal ink.
- No more than one accent color. Green is the brand foundation; gold is the accent.
- No Inter, generic serif defaults, or inconsistent font pairing.
- No centered, text-heavy hero with no visual anchor; no overlapping text and imagery.
- No repeated equal-card triplets as the automatic feature layout.
- No tiny touch targets, hidden focus states, unlabeled fields, or color-only status indicators.
- No perpetual shimmer, bounce, custom cursor, or motion that ignores reduced-motion preferences.
- No emoji used as interface iconography, generic filler copy, fake statistics, placeholder company names, or unverified trade claims.
- No filler such as “Scroll to explore,” bouncing chevrons, or redundant calls to action.
- No stock imagery with broken links or imagery that misrepresents the product or its origin.
