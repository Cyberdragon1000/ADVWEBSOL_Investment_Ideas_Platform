<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Ideastable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idea_number' => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null' => FALSE,
                'comment' => 'Idea number' ,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'title of the idea' ,
            ],
            'abstract' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'Abstract of the idea' ,
            ],
            'published_on' => [
                'type'       => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP'),//needs to be escaped apparently
                'null' => FALSE,
                'comment' => 'created date' ,
            ],
            'expires_on' => [
                'type'       => 'DATETIME',
                'default' =>new RawSql('CURRENT_TIMESTAMP'),
                'null' => FALSE,
                'comment' => 'expiry date' ,
            ],
            'author_id' => [
                'type'       => 'INT',
                'null' => FALSE,
                'comment' => 'author' ,
            ],
            'content' => [
                'type'       => 'VARCHAR',
                'constraint' => '5000',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'detailed description' ,
            ],
            'risk' => [
                'type'       => 'INT',
                'null' => FALSE,
                'constraint' => 2,
                'unsigned' => TRUE,
                'default' => 0,
                'comment' => 'risk rating ' ,
            ],
            'product_type' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'product type' ,
            ],
            'instruments' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'instruments' ,
            ],
            'currency' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'currency' ,
            ],
            'major_sector' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'major sector' ,
            ],
            'minor_sector' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'minor sector' ,
            ],
            'region' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'region' ,
            ],
            'country' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'country' ,
            ],
            
            
            
        ]);
        
        $this->forge->addKey('idea_number', true);
        $this->forge->addForeignKey('author_id', 'user_login', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ideas',true);
        $this->db->query('ALTER TABLE ideas ADD CONSTRAINT risk_range CHECK (risk >= 0 AND risk <= 10)');

        $data = array(
            array(
                    'idea_number' => "1",
                    'title' =>"Blockchain remains on the path of totally changing the face of financial transactions worldwide." ,
                    'abstract' =>"he global market for Blockchain Technology estimated at US$3.4 Billion in the year 2022, is projected to reach a 
                    revised size of US$19.9 Billion by 2026, growing at a CAGR of 43% over the analysis period. Financial institutions 
                    have been spearheading innovations in the Blockchain technology space and technology companies with a 
                    foothold in these companies will do well.",
                    'published_on' =>"2023-02-18 13:15:15" ,
                    'expires_on' =>"2024-02-18 13:15:15" ,
                    'author_id' =>"1",
                    'content' =>"
                    Fast, truly global in reach, and with low processing fees, blockchain remains on the path of totally changing the face of financial transactions worldwide. 

                    Blockchain is a permanent database that keeps record of every transaction that is executed. The technology has become an integral part of business-to-business and business-to-consumer commerce, products and legal processes. In the banking, financial services and insurance sector, growth is expected to benefit from the growing adoption of blockchain in applications such as digital identities, payments, exchanges and documentation.

                    Financial institutions have been spearheading innovations in the Blockchain technology space, with the sector already witness to successful implementations of use cases such as Nasdaq`s private market trading platform and Ripple`s cross border payment platform. Blockchain holds significant potential for prescription management, medical data, online shopping and other areas. The technology is likely to help companies in controlling supply chains, achieving traceability of products and maintaining auditable record of goods movement. In the post COVID-19 period, growth in the market will be led by next-generation blockchain innovations and the resulting development of new applications areas.Amid the COVID-19 crisis, the global market for Blockchain Technology estimated at US$3.4 Billion in the year 2022, is projected to reach a revised size of US$19.9 Billion by 2026, growing at a CAGR of 43% over the analysis period. Public, one of the segments analyzed in the report, is projected to grow at a 44.8% CAGR to reach US$21.5 Billion by the end of the analysis period.

                    The Blockchain Technology market in the U.S. is estimated at US$1 Billion in the year 2022. The country currently accounts for a 31.64% share in the global market. China, the world's second largest economy, is forecast to reach an estimated market size of US$2.1 Billion in the year 2026 trailing a CAGR of 50.2% through the analysis period.When it comes to the sector that has the highest distribution of blockchain market value, the banking industry rules with a 29.7% share. Followed by process manufacturing (11.4%), discrete manufacturing (10.9%), and professional services (6.6%) (IDC, 2020). The bullish rush by investors to increase the reach of blockchain services is of course easily matched by the ever-increasing adopters of blockchain wallets, which now stands at 40 million worldwide (Statista, 2021). To give you a perspective, that stood at just 11 million in 2016.

                    Another analysis by PwC suggests that 2025 will be the tipping point when blockchain technologies will be adopted at scale across economies worldwide. Currently, tracking and tracing of products and services is the top priority of many companies. Other key application areas include payments and financial services, contracts and dispute resolution, and identity management (PwC, 2020).                    
                    ",
                    'risk' =>"1", 
                    'product_type' =>"Equity", 
                    'instruments' =>"IBM, AWS, SAP, Oracle, Infosys", 
                    'currency' =>"", 
                    'major_sector' =>"Technology",
                    'minor_sector' =>"Software & IT Services" , 
                    'region' =>"Americas, Europe, Asia" , 
                    'country' =>"United States of America, Germany, India" 
            ),
            array(
                'idea_number' => "2",
                'title' =>"Biotech is becoming a booming industry attracting many entrepreneurs and investors. " ,
                'abstract' =>"The global biotechnology market size was estimated at USD 1,023.92 billion in 2021 and is expected to grow at a compound annual 
                growth rate (CAGR) of 13.9% from 2022 to 2030, reaching $2.44 trillion by 2028, recording a compound annual growth rate of 7.4%. 
                The market is driven by strong government support through initiatives aimed at modernization of regulatory framework, 
                improvements in approval processes & reimbursement policies, as well as standardization of clinical studies. ",
                'published_on' =>"2023-02-18 13:15:15" ,
                'expires_on' =>"2024-02-18 13:15:15" ,
                'author_id' =>"1",
                'content' =>"
                The successful development of vaccines to combat the ongoing pandemic has meant a significant increase in popularity for the biotech industry. In the past months, venture 
                capital funding for the life sciences reached record highs raising more than $30 billion in the U.S. Pacific Northwest. The global biotechnology market size was estimated at USD 
                1,023.92 billion in 2021 and is expected to grow at a compound annual growth rate (CAGR) of 13.9% from 2022 to 2030, reaching $2.44 trillion by 2028, recording a compound 
                annual growth rate of 7.4%. There’s no doubt biotech is becoming a booming industry attracting many entrepreneurs and investors. 
                Biotechnology is an interdisciplinary field that uses living creatures, biological systems, or derivatives to improve or develop procedures and outcomes for the production of 
                healthcare products and therapies. It has a significant impact on a variety of industries, including medical and pharmaceuticals, genomics, and food and chemical manufacturing. It 
                can be used to address a wide range of issues, including health and well-being, food and energy security, and environmental protection.

                The market is driven by strong government support through initiatives aimed at modernization of regulatory framework, improvements in approval processes & reimbursement 
                policies, as well as standardization of clinical studies. The growing foothold of personalized medicine and an increasing number of orphan drug formulations are opening new 
                avenues for biotechnology applications and are driving the influx of emerging and innovative biotechnology companies, further boosting the market revenue.
                The COVID-19 pandemic has positively impacted the global market by propelling a rise in opportunities and advancements for drug development and manufacturing of vaccines 
                for the disease. As per the Alliance for Regenerative Medicine, companies developing cell and gene therapies raised over USD 23.1 billion in investments globally in 2021, an 
                increase of about 16% over 2020’s total of USD 19.9 billion. The clinical success of leading gene therapy players in 2021, such as promising results from an in vivo CRISPR treatment 
                for transthyretin amyloidosis, developed by Intellia Therapeutics and Regeneron, are significantly affecting the market growth. Rising demand for clinical solutions for the 
                treatment of chronic diseases, such as cancer, diabetes, age-related macular degeneration, and almost all forms of arthritis are anticipated to boost the market.
                North America accounted for the largest share of 44.21% in 2021. The regional market is witnessing growth due to several factors, such as the presence of key players, extensive 
                R&D activities, and high healthcare expenditure. Furthermore, the rise in prevalence of chronic diseases and rising adoption of personalized medicine applications for the 
                treatment of life-threatening disorders is expected to positively impact the market growth in the region. 

                The Asia Pacific is expected to expand at the fastest growth rate from 2022 to 2030. The growth of the regional market can be attributed to increasing investments and 
                improvement in healthcare infrastructure, favorable government initiatives, and expansion strategies from key market players. For instance, in February 2022, Moderna Inc. 
                announced its plans for a geographic expansion of its commercial network in Asia through the opening of four new subsidiaries in Malaysia, Singapore, Hong Kong, and Taiwan. In 
                addition, biopharmaceutical collaborations, such as Kiniksa Pharmaceuticals and Huadong Medicine’s strategic collaboration for the development and commercialization of 
                Kiniksa’s ARCALYST and mavrilimumab in the AsiaPacific region are expected to drive the market growth.
                ",
                'risk' =>"3", 
                'product_type' =>"Equity", 
                'instruments' =>"NTLA, REGN, KNSA, 000963:CH", 
                'currency' =>"USD, CNY", 
                'major_sector' =>"Healthcare",
                'minor_sector' =>"Pharma & Medical ResearchPharma & Medical Research" , 
                'region' =>"Americas, Asia" , 
                'country' =>"United States of America, Bermuda, China" 
        ),
        array(
            'idea_number' => "3",
            'title' =>"Get in on the ground floor of the largest, most liquid US IPOs while still controlling risk by investing in the Renaissance IPO ETF." ,
            'abstract' =>"The Renaissance IPO ETF is a transparent rules-based ETF that tracks the Renaissance IPO Index designed to hold a portfolio of 
            the largest, most liquid, newly-listed U.S. IPOs. Each quarter when the ETF is rebalanced, new IPOs are included and older 
            constituents are removed. At quarterly rebalances, constituents are weighted by float-adjusted market capitalization with a cap 
            imposed on any weightings exceeding 10%. ",
            'published_on' =>"2023-02-18 13:15:15" ,
            'expires_on' =>"2024-02-18 13:15:15" ,
            'author_id' =>"1",
            'content' =>"
            The Renaissance IPO ETF is a transparent rules-based ETF that tracks the Renaissance IPO Index designed to hold a portfolio of the largest, most liquid, newly-listed U.S. IPOs. Each 
            quarter when the ETF is rebalanced, new IPOs are included and older constituents are removed. At quarterly rebalances, constituents are weighted by float-adjusted market 
            capitalization with a cap imposed on any weightings exceeding 10%. The Renaissance IPO ETF (the “Fund”), a series of Renaissance Capital Greenwich Funds (the “Trust”), seeks to 
            replicate as closely as possible, before fees and expenses, the price and yield performance of the Renaissance IPO Index (the “Index”).
            PRINCIPAL INVESTMENT STRATEGIES
            The Fund seeks to replicate as closely as possible, before fees and expenses, the price and yield performance of the Index. The Index, designed by IPO research firm Renaissance 
            Capital LLC (the “Index Provider”), is a portfolio of companies that have recently completed an initial public offering (“IPO”) and are listed on a U.S. exchange. IPOs are a category 
            of unseasoned equities under-represented in core equity indices. The Index is designed to capture approximately 80% of the total market capitalization of newly public companies, 

            which are those companies that have gone public within the last three years and meet the Index Provider’s size, liquidity and free float criteria. At each quarterly rebalance, new 
            IPOs that meet the Index Provider’s eligibility criteria are included and constituent companies that have been public for three years are removed. Constituents are weighted by 
            free float-adjusted market capitalization with individual weights capped at 10%. 
            The Index has been constructed using a transparent and rules-based methodology. The Fund normally invests at least 80% of its total assets in securities that comprise the Index. 
            Depositary receipts representing securities that comprise the Index may count towards compliance with the Fund’s 80% policy. The Fund may also invest up to 20% of its assets in 
            certain futures, options, and swap contracts, cash and cash equivalents, as well as in common stocks not included in the Index but which will help the Fund track the Index. 
            Convertible securities and depositary receipts not included in the Index may be used by the Fund in seeking performance that corresponds to its Index and in managing cash flows. 
            The Index is comprised of common stocks, depositary receipts, real estate investment trusts (“REITs”) and partnership units. These securities may include IPOs of foreign 
            companies that are listed on a U.S. exchange, as well as IPOs of companies which are located in countries categorized as emerging markets.
            The Fund’s 80% investment policy is non-fundamental and requires 60 days’ prior written notice to shareholders before it can be changed. The Fund, using a “passive” or indexing 
            investment approach, attempts to approximate the investment performance of the Index by investing in a portfolio of securities that generally replicates the Index. Renaissance 
            Capital LLC (the “Adviser”) expects that, over time, the correlation between the Fund’s performance before fees and expenses and that of the Index will be 95% or better. A figure 
            of 100% would indicate perfect correlation.
            The Fund may concentrate its investments in a particular industry or group of industries to the extent that the Index concentrates in an industry or group of industries. Information 
            technology frequently represents a major sector in the Index, and within this sector, Software frequently represents the largest industry group. The Fund may lend securities to 
            broker-dealers, banks and other institutions. When the Fund loans its portfolio securities, it will receive, at the inception of each loan, liquid collateral equal to at least 102% (for 
            U.S.-listed securities) or 105% (for non-U.S.-listed securities) of the value of the portfolio securities being loaned.
            ",
            'risk' =>"5", 
            'product_type' =>"Equity", 
            'instruments' =>"IPO", 
            'currency' =>"USD", 
            'major_sector' =>"Financials",
            'minor_sector' =>"Banking & Investment Services" , 
            'region' =>"Americas" , 
            'country' =>"United States of America" 
        ),
        array(
            'idea_number' => "4",
            'title' =>"Renewable energy is the fastest-growing energy source in North America and Europe and green energy-related companies are 
            going to benefit." ,
            'abstract' =>"Experts state that renewable energy is the fastest-growing energy source in North America and Europe. This emerging industry 
            has increased by nearly 100% in the past ten years. With the federal government funding clean energy, the coal industry decline is 
            rapidly accelerating. According to Forbes, 2022 will represent a record year for renewable energy deployment.",
            'published_on' =>"2023-02-18 13:15:15" ,
            'expires_on' =>"2024-02-18 13:15:15" ,
            'author_id' =>"1",
            'content' =>"
            Experts state that renewable energy is the fastest-growing energy source in North America and Europe. This emerging industry has increased by nearly 100% in the past ten years. 
With the federal government funding clean energy, the coal industry decline is rapidly accelerating. According to Forbes, 2022 will represent a record year for renewable energy 
deployment.
In 2021, the renewable energy sector remained remarkably resilient, driven largely by strong core fundamentals combined with a supportive policy environment. Rapid technology 
improvements and decreasing costs of renewable energy resources, along with the increased competitiveness of battery storage, have made renewables one of the most 
competitive energy sources in many areas. Despite suffering from supply chain constraints, increased shipping costs, and rising prices for key commodities, capacity installations 

remained at an all-time high. Wind and solar capacity additions of 13.8 GW in the first eight months of 2021 were up 28% over the same period in 2020. Cities, states, and utilities 
continued to take action to power the transition to renewable energy, with several setting ambitious clean energy goals, increasing renewable portfolio standards, and enacting 
energy storage procurement mandates. As of mid-November 2021, 48 out of 55 US large investor-owned utilities had committed to reduce carbon emissions, many by 2050. 
Additionally, states enacted more than 70 renewable energy and climate related policies through mid-October 2021.
Renewable energy growth is poised to accelerate going forward, as concern for climate change and support for environmental, social, and governance (ESG) considerations grow 
and demand for cleaner energy sources from most market segments (residential, commercial, and industrial consumers) accelerates. At the same time, the U.S. administration’s 
vision to fully decarbonize the US economy is helping spur activity in the renewable sector that will likely driv further growth. In the European Union, the new focus on energy 
security is also triggering an unprecedented policy momentum towards accelerating energy efficiency and renewables

            ",
            'risk' =>"3", 
            'product_type' =>"Structured Products, Equities", 
            'instruments' =>"CHPT, SPWR, AY, KNFP 0 08/25/32", 
            'currency' =>"USD, EUR", 
            'major_sector' =>"Renewable Energy, Financials",
            'minor_sector' =>"Renewable Energy Equip & Services, Banking & Investment Services" , 
            'region' =>"Americas, Europe" , 
            'country' =>"USA, GBR, FIN" 
        )
         );
        $this->db->table('ideas')->insertbatch($data);
    }
    
    public function down()
    {
        $this->forge->dropTable('ideas');
    }
}