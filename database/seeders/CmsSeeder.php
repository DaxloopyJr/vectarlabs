<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Service;
use App\Models\Setting;
use App\Models\TeamMember;
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
        if (TeamMember::count() === 0) {
            $team = [
                ['name' => 'Victor Karanja', 'role' => 'Founder & Lead Engineer', 'bio' => 'Full-stack architect with 10+ years building school management systems, fintech platforms, and cloud infrastructure across East Africa.', 'sort_order' => 1],
                ['name' => 'Amara Njoroge', 'role' => 'Head of Product Design', 'bio' => 'Leads our human-centered design practice — research, design systems, and high-fidelity prototyping for web and mobile products.', 'sort_order' => 2],
                ['name' => 'David Otieno', 'role' => 'Senior Backend Engineer', 'bio' => 'Specializes in high-concurrency APIs, PostgreSQL optimization, and event-driven microservices in Python and Node.js.', 'sort_order' => 3],
                ['name' => 'Grace Muthoni', 'role' => 'Mobile Engineering Lead', 'bio' => 'Ships cross-platform iOS and Android apps with React Native and Flutter, with a focus on offline-first experiences.', 'sort_order' => 4],
                ['name' => 'Samuel Kiprop', 'role' => 'DevOps & Cloud Engineer', 'bio' => 'Runs our AWS and Kubernetes estate — CI/CD pipelines, monitoring, and zero-downtime deployments for client platforms.', 'sort_order' => 5],
                ['name' => 'Linda Achieng', 'role' => 'Client Success Manager', 'bio' => 'Owns onboarding, documentation, and long-term support so every client team adopts new digital tools seamlessly.', 'sort_order' => 6],
            ];
            foreach ($team as $member) {
                TeamMember::create($member + ['published' => true]);
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
