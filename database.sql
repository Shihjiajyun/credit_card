-- 創建資料庫
CREATE DATABASE IF NOT EXISTS credit_card_website DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE credit_card_website;

-- 創建管理員表
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 創建文章表
CREATE TABLE IF NOT EXISTS articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    content TEXT,
    excerpt TEXT,
    featured_image VARCHAR(255),
    meta_description TEXT,
    meta_keywords VARCHAR(255),
    status ENUM('draft', 'published') DEFAULT 'draft',
    views INT DEFAULT 0,
    author_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    published_at TIMESTAMP NULL,
    FOREIGN KEY (author_id) REFERENCES admins(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 創建文章分類表
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 創建文章分類關聯表
CREATE TABLE IF NOT EXISTS article_categories (
    article_id INT,
    category_id INT,
    PRIMARY KEY (article_id, category_id),
    FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 插入預設管理員帳號 (帳號: admin, 密碼: admin123)
INSERT INTO admins (username, password) VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- 插入默認分類
INSERT INTO categories (name, slug, description) VALUES 
('信用卡攻略', 'credit-card-guides', '美國信用卡使用攻略和技巧'),
('開卡教學', 'card-application', '信用卡申請流程和注意事項'),
('權益介紹', 'benefits-guide', '各種信用卡權益詳細介紹'),
('旅行攻略', 'travel-tips', '使用信用卡優化旅行體驗'),
('最新消息', 'news', '信用卡相關最新消息和優惠');

-- 插入範例文章
INSERT INTO articles (
    title,
    slug,
    content,
    excerpt,
    meta_description,
    meta_keywords,
    status,
    author_id,
    published_at
) VALUES 
(
    '美國信用卡入門指南',
    'us-credit-card-beginner-guide',
    '<h2>什麼是美國信用卡？</h2>
    <p>美國信用卡是一種金融工具，不只能幫助您建立信用記錄，更能賺取豐厚的回饋與享受各種權益。本文將為您詳細介紹美國信用卡的基本概念。</p>
    <h3>為什麼選擇美國信用卡？</h3>
    <ul>
        <li>較高的回饋率</li>
        <li>豐富的開卡禮</li>
        <li>實用的旅遊保險</li>
        <li>全球通用</li>
    </ul>',
    '了解美國信用卡的基本概念和優勢',
    '全面介紹美國信用卡的基本知識，包括優勢、申請條件和使用技巧',
    '美國信用卡,信用卡入門,信用卡基礎,信用卡優勢',
    'published',
    1,
    CURRENT_TIMESTAMP
),
(
    'Chase Sapphire Preferred 開卡攻略',
    'chase-sapphire-preferred-guide',
    '<h2>Chase Sapphire Preferred 卡片特色</h2>
    <p>Chase Sapphire Preferred 是一張非常受歡迎的旅行信用卡，提供優秀的點數回饋和旅遊保障。</p>
    <h3>主要權益：</h3>
    <ul>
        <li>5X Chase Ultimate Rewards® 點數：透過 Chase Travel 訂購旅遊</li>
        <li>3X 點數：餐廳堂食和外送</li>
        <li>3X 點數：精選串流服務</li>
        <li>2X 點數：其他旅遊支出</li>
    </ul>',
    '詳細介紹 Chase Sapphire Preferred 的申請技巧和使用方法',
    'Chase Sapphire Preferred 信用卡完整介紹，包括權益、回饋和申請要點',
    'Chase,Sapphire Preferred,旅行信用卡,Ultimate Rewards',
    'published',
    1,
    CURRENT_TIMESTAMP
),
(
    '如何最大化信用卡獎勵',
    'maximize-credit-card-rewards',
    '<h2>信用卡獎勵最大化策略</h2>
    <p>在現代金融世界中，信用卡不僅是一種支付工具，更是一個獲得各種獎勵和優惠的途徑。本文將為您詳細介紹如何最大化您的信用卡獎勵。</p>
    
    <h3>1. 選擇適合的信用卡組合</h3>
    <p>根據您的消費習慣和需求，選擇最適合的信用卡組合是獎勵最大化的第一步：</p>
    <ul>
        <li>日常消費：選擇現金回饋卡</li>
        <li>飛行里程：選擇航空聯名卡</li>
        <li>住宿優惠：選擇酒店聯名卡</li>
    </ul>
    
    <h3>2. 善用開卡禮遇</h3>
    <p>許多信用卡都提供豐厚的開卡獎勵，通常需要在指定期限內達到特定消費金額：</p>
    <ul>
        <li>仔細規劃消費時間</li>
        <li>整合大額消費需求</li>
        <li>注意消費門檻期限</li>
    </ul>
    
    <h3>3. 掌握紅利點數運用</h3>
    <p>了解如何最有效地使用您的紅利點數：</p>
    <ul>
        <li>轉換為航空里程</li>
        <li>兌換酒店住宿</li>
        <li>購物折抵</li>
    </ul>',
    '想要最大化信用卡獎勵？本文將為您詳細介紹如何選擇適合的信用卡組合、善用開卡禮遇，以及有效運用紅利點數，讓您的每一筆消費都能獲得最大回報。',
    '了解如何最大化信用卡獎勵，包括選卡策略、開卡禮遇運用及紅利點數活用技巧。',
    '信用卡獎勵,點數回饋,開卡禮,紅利兌換,信用卡優惠',
    'published',
    1,
    CURRENT_TIMESTAMP
);

-- 創建圖片上傳記錄表
CREATE TABLE IF NOT EXISTS uploaded_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    original_name VARCHAR(255) NOT NULL,
    file_size INT NOT NULL,
    mime_type VARCHAR(100) NOT NULL,
    uploaded_by INT,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uploaded_by) REFERENCES admins(id) ON DELETE SET NULL,
    INDEX idx_uploaded_by (uploaded_by),
    INDEX idx_uploaded_at (uploaded_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 