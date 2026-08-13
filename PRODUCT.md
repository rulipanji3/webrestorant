# Product

<!-- impeccable:product-schema 1 -->

## Platform

web

## Users

- **Guests** — People in the Purwokerto area who are hungry at any hour, especially students near Unsoed and night workers. They browse the menu for the warung's daily staples, order for dine-in / takeaway / delivery, and book a table for groups. They reach this site from a phone and want to act in seconds, not browse a brochure.
- **The owner** — Mba Neni (or her staff), operating from the warung's simple counter/office. They check incoming orders and bookings, keep the menu up to date, and mark items "Habis" when they run out. The admin panel is a daily tool in a busy kitchen, not a marketing site.

## Product Purpose

"Warung Makan Mba Neni" is a 24-hour Javanese warung in Purwokerto. The site is its digital storefront: guests discover the kitchen, order food, and reserve tables; the owner runs the day's operations. Success means a genuine dish and service. The site must make the warung feel like the lived, 24-hour, family-run place it is and let the owner manage operations in minutes.

**Status — demo/portfolio showcase (confirmed by the owner):** the site is a polished, fully working showcase of a real warung; the copy, claims, photos, and address are to be kept as-is. Future work is evaluated as a coherent product, not a fictional one.

## Positioning

A 24-hour Banyumas warung wrapped in a polished, modern food experience. Unlike delivery-platform listings it owns the ordering relationship, the menu story, and the table booking directly — real street food warmth with restaurant-grade finish.

## Operating Context

- Guests arrive on mobile and want to order fast; the checkout flow is the product.
- Checkout generates a reference code (`INV-…`) and a barcode-style invoice; payment is confirmed manually ("LUNAS") — there is no payment gateway.
- WhatsApp is the bridge for both ordering and booking, driven by a phone number (`env WHATSAPP_NUMBER`).
- An order notification email is sent if a mail address is configured; the site should not fail when mail is unset.
- Admin works through a private panel secured by a login stored in `env ADMIN_USER` / `ADMIN_PASS` (no role system).

## Capabilities and Functionality

- Menu catalog with categories (Makanan / Minuman) and per-item images; each item can be toggled between available and "Habis".
- Cart + checkout: service type (dine_in / takeaway / delivery), customer name + phone, server-side quantity and item validation, unavailable items rejected before ordering.
- Booking: name, phone, date/time, guests (1–20), optional table type (indoor/outdoor/VIP), notes. Throttled routes protect both submission flows.
- Admin panel: order list with search + delete-all, menu/item + categories CRUD, bookings list with delete.
- SEO foundation: structured-data Restaurant schema, Open Graph, seo-local keywords.

## Evidence on Hand

- Real imagery and Google Maps embed for the actual location (Google Photos / Maps URLs used directly).
- Hero and About share the real interior photo (the `encrypted-tbn-t` Google thumbnail URL); the Gallery has 3 unique real tiles (`aida-public` x2 + `gps-cs-s` x1). No fake or duplicate image symbols remain.
- The site copy claims: "Est. 1998", Google rating 4.6 from 2,436+ reviews, phone `+62 281 123 4567`, `info@mbaneni.com` — the owner confirmed to keep as-is. They belong to the warung's live story and future work must preserve, not rewrite, them.
- Seeded demo menu (real local dishes: Soto Sutri, Soto Ayam, Rames, Ayam Bakar, ayam goreng kremes + drinks).

## Product Principles

1. **The warung is the brand.** Everything rings true to a 24-hour Javanese street kitchen: warm, generous, unpretentious. Honestly kept numbers and family-food heritage.
2. **Speed wins the glance.** Guests decide and order in seconds; sub-second flows beat decoration.
3. **Operationally light.** The owner is not technical. Keep the order status and manual "LUNAS" payment model simple; don't add gateways or role systems they can't run.
4. **One coherent world, two surfaces:** the guest side wants the mood; the admin side wants efficiency. They share brand tokens and never feel like separate products.
5. **Telephone is the transaction.** WhatsApp first for orders/bookings; every conversion should end in a person reachable.

## Accessibility & Inclusion

- The site is mobile-first by usage; large tap targets, readable warmth.
- No formal accessibility standard or assistive-device requirement has been confirmed; note at the moment none was brought in.