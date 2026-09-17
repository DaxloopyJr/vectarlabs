<?php

namespace Database\Seeders;

use App\Models\Industry;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\TeamMember;
use App\Models\Work;
use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    public function run(): void
    {
        // ---------------- Settings ----------------
        $settings = [
            'home.hero.eyebrow' => 'Software · Cloud · Design',
            'home.hero.title1' => 'Building High-Impact',
            'home.hero.title2' => 'Digital Infrastructure for',
            'home.hero.title3' => 'Growing Enterprises',
            'home.hero.subtitle' => 'We design, develop, and maintain complex web platforms, management systems, and mobile applications for educational institutions, NGOs, and enterprises across Africa and beyond.',
            'home.hero.button' => 'Book Consultation',
            'home.stats.1.value' => '25+',  'home.stats.1.label' => 'Projects Delivered',
            'home.stats.2.value' => '99.4%','home.stats.2.label' => 'System Uptime',
            'home.stats.3.value' => '1M+',  'home.stats.3.label' => 'Requests Processed Daily',
            'home.services.title' => 'Tailored tech solutions for modern enterprises',
            'home.sectors.title' => 'Engineered for high-growth sectors across East Africa',
            'home.testimonial.quote' => 'Replacing our fragmented legacy tools with a custom-built digital ecosystem completely transformed how our teams operate daily and deliver results.',
            'home.testimonial.author' => 'Joseph M.',
            'home.testimonial.role' => 'Operations Director, Education Group',
            'home.approach.title' => 'Our approach',
            'home.cta.title' => "Ready to elevate your institution's digital capabilities?",
            'home.cta.subtitle' => 'Get in touch with Vectarlabs to discuss modern web platforms, school management systems, and cloud infrastructure built precisely around your workflows.',
            'home.cta.button' => 'Book Consultation',
            'about.hero.eyebrow' => 'The Vectarlabs Story',
            'about.hero.title1' => 'Our mission is to make work',
            'about.hero.title2' => 'meaningful',
            'about.hero.statement' => 'We cut through complexity, empowering institutions to challenge the status quo, create unlimited opportunities — and change the world.',
            'about.stats.1.value' => '150+', 'about.stats.1.label' => 'Enterprise & SMB Clients',
            'about.stats.2.value' => '99.9%','about.stats.2.label' => 'System Uptime & Reliability',
            'about.stats.3.value' => '1M+',  'about.stats.3.label' => 'Daily API Requests Processed',
            'contact.hero.title1' => "Let's build something",
            'contact.hero.title2' => 'exceptional together.',
            'contact.hero.subtitle' => 'Tell us about your project, platform, or idea — our engineers respond within one business day.',
            'contact.email' => 'hello@vectarlabs.com',
            'contact.phone' => '+254 700 000 000',
            'contact.location' => 'Nairobi, Kenya',
        ];
        foreach ($settings as $key => $value) {
            Setting::put($key, $value);
        }

        // ---------------- Services ----------------
        $services = [
            [
                'slug' => 'custom-software-development',
                'badge' => 'Core Engineering Service',
                'title_line1' => 'CUSTOM SOFTWARE',
                'title_line2' => 'DEVELOPMENT',
                'tagline' => 'Tailor-made web applications, mobile platforms, and enterprise APIs designed to scale seamlessly, eliminate operational bottlenecks, and drive measurable revenue.',
                'list_title' => 'Capabilities',
                'list_items' => "Full-Stack Web Applications
Cross-Platform Mobile Apps
Enterprise Microservices & APIs
Database Design & Optimization
Legacy System Modernization",
                'stack_label' => 'Primary Stack',
                'stack_text' => 'Python (Django, FastAPI), JavaScript/TypeScript (React, Next.js, Node.js), PostgreSQL, Tailwind CSS, Docker.',
                'hero_button_text' => 'Start a Project',
                'overview_title' => 'Software built specifically around your workflows, not the other way around.',
                'overview_body1' => 'Off-the-shelf software often forces your business into rigid operational molds or burdens you with recurring licensing fees for features you never use. Vectarlabs delivers bespoke, production-ready software solutions built around your exact business requirements.',
                'overview_body2' => 'Whether you need a high-concurrency database platform, a customer-facing web dashboard, or mobile applications with offline-first capabilities, we build clean, secure, and maintainable software engineered to support long-term operational growth.',
                'cards_section_title' => 'Our Engineering Process',
                'cta_title1' => 'READY TO BUILD SOFTWARE THAT',
                'cta_title2' => 'GIVES YOU A COMPETITIVE EDGE?',
                'cta_subtitle' => "Tell us about your project requirements and let's scope out a tailored engineering roadmap.",
                'cta_button_text' => 'Schedule a Consultation',
                'summary' => 'Bespoke platforms, portals, and APIs engineered around your exact business processes.',
                'sort_order' => 1,
                'cards' => [
                    ['icon' => 'compass', 'title' => 'Discovery & Scoping', 'body' => 'We map out operational goals, system architecture, database models, and clear project milestones.'],
                    ['icon' => 'layout', 'title' => 'UX & System Architecture', 'body' => 'Creating intuitive user interfaces and scalable database structures tailored to performance requirements.'],
                    ['icon' => 'code', 'title' => 'Agile Engineering', 'body' => 'Iterative development cycles with continuous testing, regular feedback loops, and transparent progress updates.'],
                    ['icon' => 'rocket', 'title' => 'Deployment & Support', 'body' => 'Rigorous security checks, automated CI/CD deployment pipelines, and long-term maintenance support.'],
                ],
            ],
            [
                'slug' => 'web-mobile-applications',
                'badge' => 'Digital Experience Engineering',
                'title_line1' => 'WEB & MOBILE',
                'title_line2' => 'APPLICATIONS',
                'tagline' => 'Cross-platform mobile apps and responsive web applications built for speed, intuitive user experience, and seamless cross-device synchronization.',
                'list_title' => 'Core Solutions',
                'list_items' => "iOS & Android Native / Cross-Platform
Progressive Web Apps (PWA)
High-Performance Web Dashboards
Real-Time Offline Data Syncing
App Store & Play Store Deployment",
                'stack_label' => 'Frameworks & Tools',
                'stack_text' => 'React Native, Flutter, React / Next.js, Tailwind CSS, REST & GraphQL APIs, Firebase, AWS Cloud Services.',
                'hero_button_text' => 'Launch Your App',
                'overview_title' => 'Delivering fluid digital interfaces across mobile devices and web browsers.',
                'overview_body1' => 'In a multi-screen world, users expect fast, reliable, and visually stunning digital experiences whether they are on a phone, tablet, or desktop. Vectarlabs designs and develops custom web and mobile applications that engage users and convert interactions into measurable value.',
                'overview_body2' => 'From customer-facing iOS and Android apps to internal business portals, we focus on responsive UI/UX, optimized loading speeds, strict mobile security standards, and resilient backend integrations.',
                'cards_section_title' => 'What We Build',
                'cta_title1' => 'HAVE AN APP CONCEPT IN',
                'cta_title2' => 'MIND?',
                'cta_subtitle' => "Let's transform your vision into a published web or mobile application with top-tier user experience.",
                'cta_button_text' => 'Discuss Your App Project',
                'summary' => 'Native and cross-platform apps, PWAs, and dashboards built for speed and usability.',
                'sort_order' => 2,
                'cards' => [
                    ['icon' => 'smartphone', 'title' => 'Mobile Applications', 'body' => 'Native and cross-platform iOS and Android apps built with React Native and Flutter for near-native performance and single-codebase efficiency.'],
                    ['icon' => 'globe', 'title' => 'Progressive Web Apps', 'body' => 'Web applications equipped with offline capabilities, background push notifications, and fast loading performance directly in browser tabs.'],
                    ['icon' => 'dashboard', 'title' => 'Interactive Dashboards', 'body' => 'Modern SaaS portals and administrative analytics platforms optimized for data visualization, user access control, and quick task completion.'],
                ],
            ],
            [
                'slug' => 'ui-ux-product-design',
                'badge' => 'Human-Centered Design',
                'title_line1' => 'UI/UX & PRODUCT',
                'title_line2' => 'DESIGN',
                'tagline' => 'Intuitive user interfaces, comprehensive design systems, and seamless interaction patterns designed to elevate customer retention and drive product adoption.',
                'list_title' => 'Design Deliverables',
                'list_items' => "User Research & Wireframing
Interactive High-Fi Prototypes
Enterprise Design Systems
Cross-Platform UX Audits
Brand Identity & Visual Design",
                'stack_label' => 'Design Stack',
                'stack_text' => 'Figma, Adobe XD, Framer, Principle, Tailwind CSS Design Systems, Storybook.',
                'hero_button_text' => 'Elevate Your Product',
                'overview_title' => 'Crafting digital products that feel effortless and look exceptional.',
                'overview_body1' => 'Great software requires a bridge between complex code structures and simple human interaction. At Vectarlabs, our UI/UX methodology prioritizes clarity, accessibility, and speed—ensuring users reach their goals with minimal cognitive friction.',
                'overview_body2' => 'We build maintainable design systems and component libraries that allow frontend teams to scale applications effortlessly, maintaining visual consistency across web dashboards, landing pages, and native mobile interfaces.',
                'cards_section_title' => 'Design Pillars',
                'cta_title1' => 'READY TO REDESIGN YOUR USER',
                'cta_title2' => 'EXPERIENCE?',
                'cta_subtitle' => "Let's collaborate to build an intuitive, high-converting digital interface for your brand.",
                'cta_button_text' => 'Start Design Project',
                'summary' => 'Research-driven interfaces, design systems, and prototypes that convert users into customers.',
                'sort_order' => 3,
                'cards' => [
                    ['icon' => 'users', 'title' => 'User Architecture & Research', 'body' => 'Mapping user flows, wireframes, and customer journey maps to eliminate usability dead-ends before writing a single line of code.'],
                    ['icon' => 'layers', 'title' => 'Design Systems & UI Kits', 'body' => 'Creating reusable typography, color tokens, and UI components in Figma tailored for fast developer handoff and implementation.'],
                    ['icon' => 'target', 'title' => 'Conversion UX Optimization', 'body' => 'Optimizing onboarding funnels, checkout experiences, and dashboard navigation to maximize engagement and reduce churn.'],
                ],
            ],
            [
                'slug' => 'managed-it-services',
                'badge' => 'Enterprise Infrastructure',
                'title_line1' => 'MANAGED IT',
                'title_line2' => 'SERVICES',
                'tagline' => 'Proactive cloud architecture, server management, cybersecurity defenses, and enterprise IT support to keep your business operations running with zero downtime.',
                'list_title' => 'Core Offerings',
                'list_items' => "Cloud Infrastructure Management
Network Security & Compliance
DevOps & CI/CD Pipelines
Disaster Recovery & Backups
24/7 Monitoring & IT Support",
                'stack_label' => 'Infrastructure Stack',
                'stack_text' => 'AWS, Google Cloud, Azure, Docker, Kubernetes, Terraform, Nginx, Cloudflare, Linux System Administration.',
                'hero_button_text' => 'Secure Your Systems',
                'overview_title' => 'Robust IT infrastructure built for high availability and zero operational friction.',
                'overview_body1' => 'Modern companies depend heavily on uninterrupted server uptime, rapid database query performance, and resilient data security. Vectarlabs acts as your extended technical team, managing the complex underlying systems so you can focus on expanding your core business.',
                'overview_body2' => 'From setting up containerized Kubernetes microservices on cloud providers to enforcing multi-tier data backups and automated failover systems, we ensure your infrastructure is scalable, secure, and always compliant.',
                'cards_section_title' => 'IT Solutions Spectrum',
                'cta_title1' => 'UPGRADE YOUR IT INFRASTRUCTURE',
                'cta_title2' => 'TODAY.',
                'cta_subtitle' => 'Partner with us for reliable server management, cloud migrations, and proactive 24/7 IT support.',
                'cta_button_text' => 'Get Technical Assessment',
                'summary' => 'Cloud management, cybersecurity, and 24/7 monitoring for zero-downtime operations.',
                'sort_order' => 4,
                'cards' => [
                    ['icon' => 'cloud', 'title' => 'Cloud & DevOps Engineering', 'body' => 'Architecting and deploying automated infrastructure as code (IaC) to streamline software updates and guarantee enterprise elasticity.'],
                    ['icon' => 'shield', 'title' => 'Cybersecurity & Monitoring', 'body' => 'Enforcing strict access controls, vulnerability scanning, SSL/TLS management, and continuous server monitoring to prevent downtime.'],
                    ['icon' => 'database', 'title' => 'Data Backups & Recovery', 'body' => 'Automated snapshot backups, geo-redundant storage strategies, and instant recovery protocols to keep critical assets safe.'],
                ],
            ],
        ];

        foreach ($services as $data) {
            $cards = $data['cards'];
            unset($data['cards']);
            $service = Service::updateOrCreate(['slug' => $data['slug']], $data + ['published' => true]);
            $service->cards()->delete();
            foreach ($cards as $i => $card) {
                $service->cards()->create($card + ['sort_order' => $i + 1]);
            }
        }

        // ---------------- Team ----------------
        $team = [
            ['slug' => 'victor-karanja', 'name' => 'Victor Karanja', 'role' => 'Founder & Lead Engineer', 'bio' => "Full-stack architect with 10+ years building school management systems, fintech platforms, and cloud infrastructure across East Africa.\n\nVictor founded Vectarlabs after leading digitization programs for national education networks, where he saw first-hand how fragmented tooling holds institutions back. He now sets the technical direction for every client platform — from data modeling and API design to cloud cost governance.\n\nHe is a strong advocate for boring, reliable technology: well-tested monoliths where they fit, event-driven services where they matter, and documentation that outlives the team that wrote it.", 'email' => 'victor@vectarlabs.com', 'phone' => '+254 700 000 001', 'website' => 'https://vectarlabs.com', 'linkedin' => 'https://linkedin.com/in/victor-karanja', 'twitter' => 'https://x.com/victorkaranja', 'github' => 'https://github.com/vkaranja', 'sort_order' => 1],
            ['slug' => 'amara-njoroge', 'name' => 'Amara Njoroge', 'role' => 'Head of Product Design', 'bio' => "Leads our human-centered design practice — research, design systems, and high-fidelity prototyping for web and mobile products.\n\nAmara has spent eight years turning complex operational workflows into interfaces people genuinely enjoy using. She runs our discovery workshops, builds the component libraries our engineers ship from, and audits every screen for accessibility before release.\n\nHer design systems currently power dashboards used daily by thousands of teachers, administrators, and field officers.", 'email' => 'amara@vectarlabs.com', 'phone' => '+254 700 000 002', 'website' => 'https://vectarlabs.com', 'linkedin' => 'https://linkedin.com/in/amara-njoroge', 'twitter' => 'https://x.com/amaranjoroge', 'github' => null, 'sort_order' => 2],
            ['slug' => 'david-otieno', 'name' => 'David Otieno', 'role' => 'Senior Backend Engineer', 'bio' => "Specializes in high-concurrency APIs, PostgreSQL optimization, and event-driven microservices in Python and Node.js.\n\nDavid is the engineer behind the platforms that quietly process over a million requests a day. He designs our database schemas, writes the query plans that keep dashboards snappy, and owns the message-queue infrastructure that syncs offline-first mobile apps.\n\nBefore Vectarlabs he scaled payment APIs at a Nairobi fintech from thousands to millions of monthly transactions.", 'email' => 'david@vectarlabs.com', 'phone' => '+254 700 000 003', 'website' => null, 'linkedin' => 'https://linkedin.com/in/david-otieno', 'twitter' => null, 'github' => 'https://github.com/dotieno', 'sort_order' => 3],
            ['slug' => 'grace-muthoni', 'name' => 'Grace Muthoni', 'role' => 'Mobile Engineering Lead', 'bio' => "Ships cross-platform iOS and Android apps with React Native and Flutter, with a focus on offline-first experiences.\n\nGrace leads every mobile product from prototype to store release. Her specialty is building apps that keep working in low-connectivity environments — local-first data sync, resilient retry queues, and interfaces that never lose a user's work.\n\nShe also runs our device-lab testing program covering the Android handsets most common across East Africa.", 'email' => 'grace@vectarlabs.com', 'phone' => '+254 700 000 004', 'website' => null, 'linkedin' => 'https://linkedin.com/in/grace-muthoni', 'twitter' => 'https://x.com/gracemuthoni', 'github' => 'https://github.com/gmuthoni', 'sort_order' => 4],
            ['slug' => 'samuel-kiprop', 'name' => 'Samuel Kiprop', 'role' => 'DevOps & Cloud Engineer', 'bio' => "Runs our AWS and Kubernetes estate — CI/CD pipelines, monitoring, and zero-downtime deployments for client platforms.\n\nSamuel keeps the lights on: automated backups, blue-green deployments, and alerting that catches issues before clients notice them. He manages infrastructure as code across AWS and GCP and drives our 99.9% uptime record.\n\nHe also leads our security hardening program — vulnerability scanning, patch management, and access-control audits.", 'email' => 'samuel@vectarlabs.com', 'phone' => '+254 700 000 005', 'website' => null, 'linkedin' => 'https://linkedin.com/in/samuel-kiprop', 'twitter' => null, 'github' => 'https://github.com/skiprop', 'sort_order' => 5],
            ['slug' => 'linda-achieng', 'name' => 'Linda Achieng', 'role' => 'Client Success Manager', 'bio' => "Owns onboarding, documentation, and long-term support so every client team adopts new digital tools seamlessly.\n\nLinda is the bridge between our engineers and the people who use what we build. She designs the training workshops, writes the user guides, and runs the support desk that answers within one business day.\n\nHer onboarding playbooks have taken school networks from spreadsheet chaos to fully adopted digital platforms in under a term.", 'email' => 'linda@vectarlabs.com', 'phone' => '+254 700 000 006', 'website' => null, 'linkedin' => 'https://linkedin.com/in/linda-achieng', 'twitter' => null, 'github' => null, 'sort_order' => 6],
        ];
        foreach ($team as $member) {
            TeamMember::updateOrCreate(['slug' => $member['slug']], $member + ['published' => true]);
        }

        // ---------------- Products ----------------
        if (Product::count() === 0) {
            $products = [
                ['name' => 'EduSphere SMS', 'type' => 'saas', 'tagline' => 'Complete school management in the cloud', 'description' => 'A multi-tenant school management platform covering admissions, timetabling, fee tracking with M-Pesa integration, exam reporting, and parent communication. Hosted, backed up, and updated by Vectarlabs — schools simply log in.', 'sort_order' => 1],
                ['name' => 'SaccoFlow', 'type' => 'saas', 'tagline' => 'SACCO & microfinance operations platform', 'description' => 'Member management, share capital tracking, loan origination and appraisal workflows, dividend processing, and automated SMS statements. Includes mobile member portal and regulator-ready reporting.', 'sort_order' => 2],
                ['name' => 'StockPilot Pro', 'type' => 'standalone', 'tagline' => 'Inventory & POS for retail chains', 'description' => 'An offline-capable inventory and point-of-sale system for shops, pharmacies, and hardware stores. Runs on-premise with barcode support, multi-branch stock transfers, and end-of-day reconciliation reports.', 'sort_order' => 3],
                ['name' => 'ClinicDesk', 'type' => 'standalone', 'tagline' => 'Clinic & patient records management', 'description' => 'A deployable hospital management system for clinics and dispensaries: patient registration, consultation notes, pharmacy dispensing, lab orders, and NHIF claim preparation. Installed on your own servers with full data ownership.', 'sort_order' => 4],
                ['name' => 'LmsBridge', 'type' => 'saas', 'tagline' => 'E-learning portal for institutions', 'description' => 'A hosted learning management system with course authoring, quizzes, video lessons, progress analytics, and certificate generation. Integrates with EduSphere SMS for unified student records.', 'sort_order' => 5],
                ['name' => 'FieldSync', 'type' => 'standalone', 'tagline' => 'Offline field data collection toolkit', 'description' => 'A self-hosted data-collection suite for NGOs and research teams: form builder, Android data-capture app, GPS tagging, and dashboard exports. Works fully offline and syncs when connectivity returns.', 'sort_order' => 6],
            ];
            foreach ($products as $product) {
                Product::create($product + ['published' => true]);
            }
        }

        // ---------------- Industries ----------------
        if (Industry::count() === 0) {
            $industries = [
                ['slug' => 'education', 'name' => 'Education & Schools', 'icon' => 'graduation', 'tagline' => 'Complete digital infrastructure for learning institutions', 'summary' => 'School management systems, e-learning portals, and academic analytics — from admissions to alumni.', 'description' => "Education is where Vectarlabs started, and it remains our deepest practice. We build the systems that run entire institutions: admissions pipelines, timetabling, fee collection with mobile-money integration, examination processing, and parent communication.\n\nOur platforms serve primary schools, secondary schools, TVET colleges, and universities — designed for low-bandwidth environments, shared devices, and staff who have better things to do than fight software.\n\nBeyond management systems, we deliver e-learning portals, digital library integrations, and analytics dashboards that help leadership spot at-risk students before term-end.", 'offerings' => "School Management Systems (SMS)\nE-learning & LMS Portals\nFee Collection & M-Pesa Integration\nExam & Report Card Processing\nStudent Analytics Dashboards\nParent & Teacher Communication Apps", 'sort_order' => 1],
                ['slug' => 'agriculture', 'name' => 'Agriculture & AgriTech', 'icon' => 'sprout', 'tagline' => 'Farm-to-market technology for rural value chains', 'summary' => 'Traceability tools, USSD services, and logistics dashboards connecting farmers to markets.', 'description' => "Agriculture employs most of East Africa, yet its value chains run on paper and phone calls. We build the connective tissue: produce traceability from farm gate to buyer, aggregation and logistics dashboards for cooperatives, and USSD/SMS services that work on any phone.\n\nOur agri-platforms handle offline-first data collection in the field, syncing when connectivity returns, and integrate weather, market-price, and agronomy advisory feeds.\n\nWhether you run an out-grower scheme, a cooperative union, or an agro-processor, we design systems your field officers will actually use.", 'offerings' => "Produce Traceability Platforms\nCooperative & Aggregation Management\nUSSD & SMS Farmer Services\nOffline Field Data Collection\nMarket Price & Weather Integrations\nLogistics & Cold-Chain Dashboards", 'sort_order' => 2],
                ['slug' => 'business', 'name' => 'Business & Enterprise', 'icon' => 'briefcase', 'tagline' => 'Operations software for growing companies', 'summary' => 'ERP-lite platforms, inventory & POS, and workflow automation for SMEs and enterprises.', 'description' => "Growing businesses outgrow spreadsheets long before they can afford enterprise ERPs. We close that gap with right-sized operations software: inventory and point-of-sale, multi-branch stock control, HR and payroll workflows, and management dashboards that show the whole business at a glance.\n\nEvery system is built around your actual process — not the other way round — with integrations to accounting tools, payment providers, and government e-services where required.\n\nThe result: fewer manual reconciliations, fewer stockouts, and decisions based on live numbers instead of last month's report.", 'offerings' => "Inventory & Point-of-Sale Systems\nMulti-Branch Operations Dashboards\nHR, Payroll & Approval Workflows\nCustomer Portals & CRM\nAccounting & Payment Integrations\nBusiness Intelligence Reporting", 'sort_order' => 3],
                ['slug' => 'fintech', 'name' => 'Fintech & SACCOs', 'icon' => 'banknote', 'tagline' => 'Secure financial platforms built for African markets', 'summary' => 'SACCO management, payment integrations, and lending workflows with regulator-ready reporting.', 'description' => "Financial software demands a higher bar: audit trails, role-based access, reconciliation that always balances, and uptime you can stake your licence on. We build SACCO and microfinance platforms, payment integrations (M-Pesa, card, bank APIs), and lending workflow engines that meet that bar.\n\nOur fintech work includes member portals, automated dividend processing, loan origination and appraisal pipelines, and the statutory reports regulators ask for.\n\nSecurity reviews and penetration-test coordination are part of every engagement — not an afterthought.", 'offerings' => "SACCO & Microfinance Platforms\nM-Pesa & Payment Gateway Integration\nLoan Origination & Appraisal Workflows\nMember & Agent Portals\nAutomated Statements & SMS Alerts\nRegulator-Ready Reporting", 'sort_order' => 4],
                ['slug' => 'health', 'name' => 'Health & Clinics', 'icon' => 'heart', 'tagline' => 'Patient-centred systems for clinics and dispensaries', 'summary' => 'Clinic management, patient records, and NHIF-ready claim preparation for healthcare providers.', 'description' => "Clinics run on their records, and records run on systems that must never lose a patient file. We deploy clinic management platforms covering registration, consultation notes, pharmacy dispensing, laboratory orders, and insurance claim preparation.\n\nOur health deployments emphasise data ownership and confidentiality: on-premise or private-cloud hosting, encrypted backups, and access controls mapped to clinical roles.\n\nFor county health programmes and NGOs, we build reporting pipelines that aggregate facility data into programme dashboards without exposing patient identities.", 'offerings' => "Clinic & Patient Records Management\nPharmacy & Lab Order Workflows\nNHIF & Insurance Claim Preparation\nAppointment & Reminder Systems\nFacility Reporting Dashboards\nSecure On-Premise Deployments", 'sort_order' => 5],
                ['slug' => 'ngo-public', 'name' => 'NGOs & Public Sector', 'icon' => 'globe', 'tagline' => 'Transparency and accountability through better data', 'summary' => 'M&E dashboards, reporting portals, and community data-collection platforms for impact programmes.', 'description' => "Development programmes live and die by their data. We build monitoring & evaluation dashboards, beneficiary management systems, and community data-collection platforms that turn field reports into decisions.\n\nOur public-sector work includes transparency portals, permit and licensing workflows, and citizen-feedback channels — designed for auditability from day one.\n\nWe understand donor reporting cycles and build the exports and evidence trails your grants team needs, in the formats they need them.", 'offerings' => "Monitoring & Evaluation Dashboards\nBeneficiary Management Systems\nCommunity Data Collection (Offline-First)\nTransparency & Reporting Portals\nGrant & Donor Reporting Exports\nCitizen Feedback Channels", 'sort_order' => 6],
            ];
            foreach ($industries as $industry) {
                Industry::create($industry + ['published' => true]);
            }
        }

        // ---------------- Works (portfolio) ----------------
        if (Work::count() === 0) {
            $works = [
                ['slug' => 'greenhill-schools-platform', 'title' => 'Greenhill Schools Platform', 'client' => 'Greenhill Academy Group', 'category' => 'Web Platform', 'industry' => 'Education', 'year' => '2025', 'summary' => 'A unified school management platform for a 12-campus academy group — admissions, fees, exams, and parent apps in one system.', 'description' => "Greenhill ran twelve campuses on twelve spreadsheets. We consolidated every campus into a single multi-tenant platform: one admissions pipeline, centralised fee collection with M-Pesa, and report cards generated in minutes instead of weeks.\n\nThe rollout included staff training at every campus and a phased migration of five years of historical records.\n\nWithin the first term, fee reconciliation time dropped 85% and parent portal adoption passed 70%.", 'tags' => 'School Management, M-Pesa, Multi-tenant, React, PostgreSQL', 'featured' => true, 'sort_order' => 1],
                ['slug' => 'saccoflow-national-rollout', 'title' => 'SACCO Core Banking Rollout', 'client' => 'Confidential — Financial Sector', 'category' => 'Fintech Platform', 'industry' => 'Fintech', 'year' => '2024', 'summary' => 'Core SACCO platform serving 40,000+ members — shares, loans, dividends, and mobile banking with regulator-ready reports.', 'description' => "A rapidly growing SACCO needed to replace a desktop system that buckled under 40,000 members. We built SaccoFlow: share capital tracking, loan origination with appraisal workflows, automated dividend runs, and a member mobile portal.\n\nDeployment included M-Pesa paybill integration, SMS statements, and the full statutory reporting pack.\n\nThe system now processes over a million transactions a month with zero unplanned downtime since launch.", 'tags' => 'SACCO, Lending, M-Pesa, SMS, Node.js, MySQL', 'featured' => true, 'sort_order' => 2],
                ['slug' => 'agritrace-supply-chain', 'title' => 'AgriTrace Supply Chain Platform', 'client' => 'Highlands Growers Cooperative', 'category' => 'Data Platform', 'industry' => 'Agriculture', 'year' => '2025', 'summary' => 'Farm-to-buyer traceability for 6,000 smallholder farmers — offline field capture, aggregation logistics, and export documentation.', 'description' => "Highlands Growers needed verifiable traceability to access premium export markets. Field officers now capture deliveries offline on Android devices, syncing at aggregation centres.\n\nThe platform tracks each lot from farm gate to container, generating the documentation exporters and certifiers require.\n\nBuyer audits that once took two weeks of paperwork now take an afternoon.", 'tags' => 'Traceability, Offline-first, Android, USSD, Dashboards', 'featured' => true, 'sort_order' => 3],
                ['slug' => 'clinicdesk-county-deployment', 'title' => 'ClinicDesk County Deployment', 'client' => 'County Health Network', 'category' => 'Health Systems', 'industry' => 'Health', 'year' => '2024', 'summary' => 'Patient records and clinic management across 23 facilities — registration, pharmacy, lab orders, and NHIF claims.', 'description' => "A county health network digitised 23 clinics and dispensaries on ClinicDesk: patient registration, consultation notes, pharmacy dispensing, and laboratory orders.\n\nEach facility runs on-premise with encrypted replication to the county dashboard, preserving uptime through connectivity gaps.\n\nNHIF claim preparation time fell from days to hours, and stock-out reports finally reach procurement before shelves empty.", 'tags' => 'Health Records, NHIF, On-premise, Reporting', 'featured' => false, 'sort_order' => 4],
                ['slug' => 'retail-chain-pos', 'title' => 'Multi-Branch Retail POS', 'client' => 'TamuMart Retail Chain', 'category' => 'Commerce', 'industry' => 'Business', 'year' => '2025', 'summary' => 'Offline-capable POS and inventory for a 9-branch retail chain — barcode sales, stock transfers, and live margin dashboards.', 'description' => "TamuMart's nine branches each ran isolated tills; head office learned about stockouts from angry customers. We deployed StockPilot Pro across all branches with centralised catalogues and pricing.\n\nInter-branch stock transfers, end-of-day reconciliation, and live margin dashboards gave management a single version of the truth.\n\nShrinkage dropped measurably within two quarters, and reorder decisions are now driven by data, not guesswork.", 'tags' => 'POS, Inventory, Offline-capable, Analytics', 'featured' => false, 'sort_order' => 5],
                ['slug' => 'eduwatch-me-dashboard', 'title' => 'EduWatch M&E Dashboard', 'client' => 'International Education NGO', 'category' => 'Data & Analytics', 'industry' => 'NGO', 'year' => '2024', 'summary' => 'Monitoring & evaluation platform tracking learning outcomes across 300 schools for a donor-funded literacy programme.', 'description' => "A literacy programme spanning 300 schools needed evidence, not anecdotes. We built EduWatch: offline-first assessment capture by field officers, automated data quality checks, and dashboards sliced by region, school, and cohort.\n\nDonor reports now generate directly from the platform in the exact formats each funder requires.\n\nProgramme managers spot struggling schools within a term instead of after the annual review.", 'tags' => 'M&E, Offline-first, Dashboards, Donor Reporting', 'featured' => false, 'sort_order' => 6],
            ];
            foreach ($works as $work) {
                Work::create($work + ['published' => true]);
            }
        }

        // ---------------- Posts ----------------
        if (Post::count() === 0) {
            $posts = [
                ['title' => 'Evaluating Security Vulnerabilities and Data Privacy in Educational Software', 'excerpt' => 'How modern school platforms expose student data — and the audit checklist we run before any deployment.', 'tag' => 'Security', 'cover_style' => 'gradient-a'],
                ['title' => 'Modernizing Legacy School Systems to Scalable Django & PostgreSQL Platforms', 'excerpt' => 'A field guide to migrating spreadsheets and Access databases into resilient web infrastructure.', 'tag' => 'Engineering', 'cover_style' => 'gradient-b'],
                ['title' => 'Designing Frictionless Mobile Payment Flows for East African Enterprises', 'excerpt' => 'UX patterns that raise completion rates for M-Pesa and card checkout experiences.', 'tag' => 'Design', 'cover_style' => 'gradient-c'],
                ['title' => 'Security & Privacy Audits', 'excerpt' => 'Evaluating critical vulnerability points and establishing robust data privacy protocols prior to enterprise platform adoption.', 'tag' => 'Security', 'cover_style' => 'gradient-b'],
                ['title' => 'Architecting Scalable Web Engines', 'excerpt' => 'How modern full-stack web frameworks like Django and PostgreSQL eliminate technical debt and streamline operational efficiency.', 'tag' => 'Engineering', 'cover_style' => 'gradient-c'],
            ];
            foreach ($posts as $post) {
                Post::create($post + ['published' => true]);
            }
        }
    }
}
