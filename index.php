<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>美國信用卡玩賺世界</title>
    <link rel="stylesheet" href="styless.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- 在 </head> 標籤前加入 Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

</head>
<body>
    <!-- 導航欄 -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom-navy fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="Logo" height="50" class="me-2">
                美國信用卡玩賺世界
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">首頁</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">關於我們</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cards">信用卡推薦</a></li>
                    <li class="nav-item"><a class="nav-link" href="#events">活動紀錄</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">服務介紹</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonials">客戶評價</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">預約諮詢</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero 區域 -->
    <section id="home" class="hero-section text-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md-10 col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-4" data-aos="fade-up">美國信用卡玩賺世界</h1>
                    <!-- <p class="lead mb-4" data-aos="fade-up" data-aos-delay="100">我們不只是幫你把卡辦好，更把每一段服務的哩程，都當成自己的旅程</p> -->
                    <div data-aos="fade-up" data-aos-delay="200">
                        <a href="#services" class="btn btn-light btn-lg">開啟玩賺世界</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 關於我們 -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="about-content-left h-100 p-5 d-flex flex-column justify-content-center" style="background: linear-gradient(135deg, var(--primary-color), #1a365d);">
                        <div class="text-white">
                            <div class="mb-4">
                                <div class="d-inline-flex align-items-center mb-3">
                                    <div class="icon-circle me-3" style="width: 60px; height: 60px; background: var(--gold-color); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <i class="bi bi-award-fill" style="font-size: 1.8rem; color: var(--primary-color);"></i>
                                    </div>
                                    <h3 class="mb-0 text-gold">專業顧問團隊</h3>
                                </div>
                                <p class="lead mb-4" style="line-height: 1.8; font-size: 1.1rem;">
                                    是一群對服務吹毛求疵的信用卡顧問組成，我們不只是幫你把卡辦好，更把每一段服務的里程，都當成自己的旅程。
                                </p>
                            </div>
                            
                            <div class="highlight-quote p-4 rounded border-start border-4 border-warning" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
                                <p class="mb-0 fw-medium" style="font-size: 1.15rem; line-height: 1.6;">
                                    <i class="bi bi-quote text-gold me-2"></i>
                                    因為，這不只是「一張卡」的服務，而是一段「玩賺世界的哩程」。
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-content-right h-100 p-5 d-flex flex-column justify-content-center" style="background: white;">
                        <div class="service-journey">
                            <div class="mb-4">
                                <h4 class="text-dark mb-3 d-flex align-items-center">
                                    <i class="bi bi-arrow-right-circle-fill text-gold me-3" style="font-size: 1.5rem;"></i>
                                    完整服務流程
                                </h4>
                                <p class="text-muted mb-4">從選卡到售後客服，我們都不缺席</p>
                            </div>
                            
                            <div class="service-steps">
                                <div class="row g-3">
                                    <div class="col-6 col-md-4">
                                        <div class="service-step text-center p-3 rounded shadow-sm" style="background: #f8f9fa; border: 2px solid transparent; transition: all 0.3s ease;">
                                            <i class="bi bi-1-circle-fill text-gold mb-2" style="font-size: 1.5rem;"></i>
                                            <div class="fw-semibold text-dark">選卡</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="service-step text-center p-3 rounded shadow-sm" style="background: #f8f9fa; border: 2px solid transparent; transition: all 0.3s ease;">
                                            <i class="bi bi-2-circle-fill text-gold mb-2" style="font-size: 1.5rem;"></i>
                                            <div class="fw-semibold text-dark">核卡</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="service-step text-center p-3 rounded shadow-sm" style="background: #f8f9fa; border: 2px solid transparent; transition: all 0.3s ease;">
                                            <i class="bi bi-3-circle-fill text-gold mb-2" style="font-size: 1.5rem;"></i>
                                            <div class="fw-semibold text-dark">開通</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="service-step text-center p-3 rounded shadow-sm" style="background: #f8f9fa; border: 2px solid transparent; transition: all 0.3s ease;">
                                            <i class="bi bi-4-circle-fill text-gold mb-2" style="font-size: 1.5rem;"></i>
                                            <div class="fw-semibold text-dark">刷卡技巧</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="service-step text-center p-3 rounded shadow-sm" style="background: #f8f9fa; border: 2px solid transparent; transition: all 0.3s ease;">
                                            <i class="bi bi-5-circle-fill text-gold mb-2" style="font-size: 1.5rem;"></i>
                                            <div class="fw-semibold text-dark">權益使用</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="service-step text-center p-3 rounded shadow-sm" style="background: #f8f9fa; border: 2px solid transparent; transition: all 0.3s ease;">
                                            <i class="bi bi-6-circle-fill text-gold mb-2" style="font-size: 1.5rem;"></i>
                                            <div class="fw-semibold text-dark">售後客服</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-4 pt-3 border-top">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <small class="text-muted">
                                            <i class="bi bi-shield-check text-gold me-2"></i>
                                            全程專業陪伴，值得您的信任
                                        </small>
                                    </div>
                                    <div class="col-md-4 text-md-end mt-2 mt-md-0">
                                        <a href="https://line.me/ti/p/@927ukytp" class="btn btn-outline-primary btn-sm" target="_blank">
                                            <i class="bi bi-chat-dots me-1"></i>
                                            了解更多
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 信用卡分類 -->
    <section id="cards" class="card-section">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">
                <span class="text-gold">精選</span>信用卡推薦
            </h2>
            <div class="row mb-4">
                <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                    <div class="alert alert-warning border-warning" style="background: rgba(255, 193, 7, 0.1);">
                        <i class="bi bi-info-circle me-2"></i>
                        <strong>重要提醒：</strong>開卡禮會依照活動以及個人不同而有變化。以下僅為參考範例。
                    </div>
                </div>
            </div>
            
            <!-- 旅行酒店系列 -->
            <div class="mb-5 pb-3" data-aos="fade-up">
                <div class="row">
                    <div class="col-12">
                        <h3 class="card-group-heading">American Express <span class="text-gold">旅行酒店系列</span></h3>
                        <p class="lead mb-4">酒店聯名卡專屬權益，享受頂級住宿體驗與會員尊榮禮遇</p>
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    <!-- Marriott Bonvoy Brilliant Card -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="flip-card">
                            <div class="flip-toggle-btn">+</div>
                            <div class="flip-card-inner">
                                <!-- 卡片正面 -->
                                <div class="flip-card-front">
                                    <div class="card h-100">
                                        <!-- 卡片標題 -->
                                        <div class="card-header text-center py-3">
                                            <h5 class="mb-0 text-gold fw-bold">Marriott Bonvoy Brilliant®</h5>
                                            <small class="text-light">萬豪璀璨卡</small>
                                        </div>
                                        
                                        <!-- 卡片圖片 -->
                                        <div class="text-center py-3" style="background: rgba(255,255,255,0.05);">
                                            <img src="./img/American _1.png" alt="Marriott Bonvoy Brilliant Card" class="img-fluid" style="max-width: 180px; border-radius: 10px;">
                                        </div>
                                        
                                        <!-- 開卡禮區塊 -->
                                        <div class="px-3 py-2" style="background: rgba(255, 215, 0, 0.1); border-top: 1px solid rgba(255, 215, 0, 0.3); border-bottom: 1px solid rgba(255, 215, 0, 0.3);">
                                            <div class="text-center">
                                                <div class="text-gold fw-bold mb-1">開卡禮</div>
                                                <div class="text-white small">
                                                    前6個月消費 <span class="text-gold fw-bold">$8,000</span><br>
                                                    獲得
                                                </div>
                                                <div class="mt-1">
                                                    <span class="text-gold fw-bold fs-4">150,000</span> 
                                                    <span class="text-white">Marriott積分</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- 年費與權益 -->
                                        <div class="card-body py-3">
                                            <div class="row g-2 mb-3">
                                                <div class="col-6">
                                                    <div class="text-center p-2 rounded" style="background: rgba(255,255,255,0.1);">
                                                        <div class="text-gold small fw-bold">年費</div>
                                                        <div class="text-white fw-bold">$650</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-center p-2 rounded" style="background: rgba(255,255,255,0.1);">
                                                        <div class="text-gold small fw-bold">主要倍數</div>
                                                        <div class="text-white fw-bold">6X 萬豪</div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="text-center">
                                                <div class="text-gold fw-bold mb-2">核心權益</div>
                                                <div class="small text-white lh-sm">
                                                    <div>• 萬豪酒店 6X 積分</div>
                                                    <div>• 餐廳消費 3X 積分</div>
                                                    <div>• 萬豪旅享家白金會員</div>
                                                    <div>• 年度$300餐飲積分</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flip-hint">
                                        <i class="bi bi-info-circle"></i> 點擊右上角按鈕查看詳情
                                    </div>
                                </div>
                                
                                <!-- 卡片背面 -->
                                <div class="flip-card-back">
                                    <h4 class="text-gold mb-4">萬豪尊榮權益</h4>
                                    
                                    <div class="row g-3 text-start">
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-building me-2"></i>酒店權益</h6>
                                                <ul class="mb-0 small">
                                                    <li>萬豪酒店住宿：6X 積分</li>
                                                    <li>自動萬豪白金菁英會籍</li>
                                                    <li>每年免費住宿券(up to 85k分)</li>
                                                    <li>25個菁英夜數積分</li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-credit-card me-2"></i>消費回饋</h6>
                                                <ul class="mb-0 small">
                                                    <li>全球餐廳：3X 積分</li>
                                                    <li>航空消費：3X 積分</li>
                                                    <li>萬豪酒店：6X 積分</li>
                                                    <li>其他消費：2X 積分</li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-star-fill me-2"></i>專屬禮遇</h6>
                                                <ul class="mb-0 small">
                                                    <li>年度$300餐飲積分</li>
                                                    <li>Priority Pass機場貴賓室</li>
                                                    <li>TSA PreCheck/Global Entry積分</li>
                                                    <li>無境外交易手續費</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <a href="#consultation" class="btn btn-gold w-100">立即諮詢申請</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Marriott Bonvoy Business Card -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="flip-card">
                            <div class="flip-toggle-btn">+</div>
                            <div class="flip-card-inner">
                                <!-- 卡片正面 -->
                                <div class="flip-card-front">
                                    <div class="card h-100">
                                        <!-- 卡片標題 -->
                                        <div class="card-header text-center py-3">
                                            <h5 class="mb-0 text-gold fw-bold">Marriott Bonvoy Business®</h5>
                                            <small class="text-light">萬豪商務卡</small>
                                        </div>
                                        
                                        <!-- 卡片圖片 -->
                                        <div class="text-center py-3" style="background: rgba(255,255,255,0.05);">
                                            <img src="./img/American _2.png" alt="Marriott Bonvoy Business Card" class="img-fluid" style="max-width: 180px; border-radius: 10px;">
                                        </div>
                                        
                                        <!-- 開卡禮區塊 -->
                                        <div class="px-3 py-2" style="background: rgba(255, 215, 0, 0.1); border-top: 1px solid rgba(255, 215, 0, 0.3); border-bottom: 1px solid rgba(255, 215, 0, 0.3);">
                                            <div class="text-center">
                                                <div class="text-gold fw-bold mb-1">開卡禮</div>
                                                <div class="text-white">
                                                    前6個月消費 <span class="text-gold fw-bold">$6,000</span> 獲得
                                                </div>
                                                <div class="mt-1">
                                                    <span class="text-gold fw-bold fs-4">3張免費住宿券</span><br>
                                                    <small class="text-light">(up to 50k分/張)</small>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- 年費與權益 -->
                                        <div class="card-body py-3">
                                            <div class="row g-2 mb-3">
                                                <div class="col-6">
                                                    <div class="text-center p-2 rounded" style="background: rgba(255,255,255,0.1);">
                                                        <div class="text-gold small fw-bold">年費</div>
                                                        <div class="text-white fw-bold">$125</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-center p-2 rounded" style="background: rgba(255,255,255,0.1);">
                                                        <div class="text-gold small fw-bold">主要倍數</div>
                                                        <div class="text-white fw-bold">6X 萬豪</div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="text-center">
                                                <div class="text-gold fw-bold mb-2">核心權益</div>
                                                <div class="small text-white lh-sm">
                                                    <div>• 萬豪酒店 6X 積分</div>
                                                    <div>• 餐廳/加油站 4X 積分</div>
                                                    <div>• 自動金卡菁英會籍</div>
                                                    <div>• 15個菁英夜數積分</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flip-hint">
                                        <i class="bi bi-info-circle"></i> 點擊右上角按鈕查看詳情
                                    </div>
                                </div>
                                
                                <!-- 卡片背面 -->
                                <div class="flip-card-back">
                                    <h4 class="text-gold mb-4">商務旅行專屬</h4>
                                    
                                    <div class="row g-3 text-start">
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-building me-2"></i>酒店權益</h6>
                                                <ul class="mb-0 small">
                                                    <li>萬豪酒店住宿：6X 積分</li>
                                                    <li>自動萬豪金卡菁英會籍</li>
                                                    <li>每年免費住宿券(up to 35k分)</li>
                                                    <li>年消費$60k額外住宿券</li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-briefcase me-2"></i>消費回饋</h6>
                                                <ul class="mb-0 small">
                                                    <li>全球餐廳：4X 積分</li>
                                                    <li>美國加油站：4X 積分</li>
                                                    <li>無線電話服務：4X 積分</li>
                                                    <li>美國運輸：4X 積分</li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-star me-2"></i>專屬禮遇</h6>
                                                <ul class="mb-0 small">
                                                    <li>15個菁英夜數積分</li>
                                                    <li>7%萬豪會員房價折扣</li>
                                                    <li>無境外交易手續費</li>
                                                    <li>員工卡免費添加</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <a href="#consultation" class="btn btn-gold w-100">立即諮詢申請</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hilton Honors Card -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="flip-card">
                            <div class="flip-toggle-btn">+</div>
                            <div class="flip-card-inner">
                                <!-- 卡片正面 -->
                                <div class="flip-card-front">
                                    <div class="card h-100">
                                        <!-- 卡片標題 -->
                                        <div class="card-header text-center py-3">
                                            <h5 class="mb-0 text-gold fw-bold">Hilton Honors®</h5>
                                            <small class="text-light">希爾頓榮譽卡</small>
                                        </div>
                                        
                                        <!-- 卡片圖片 -->
                                        <div class="text-center py-3" style="background: rgba(255,255,255,0.05);">
                                            <img src="./img/American _3.png" alt="Hilton Honors Card" class="img-fluid" style="max-width: 180px; border-radius: 10px;">
                                        </div>
                                        
                                        <!-- 開卡禮區塊 -->
                                        <div class="px-3 py-2" style="background: rgba(255, 215, 0, 0.1); border-top: 1px solid rgba(255, 215, 0, 0.3); border-bottom: 1px solid rgba(255, 215, 0, 0.3);">
                                            <div class="text-center">
                                                <div class="text-gold fw-bold mb-1">開卡禮</div>
                                                <div class="text-white small">
                                                    前6個月消費 <span class="text-gold fw-bold">$2,000</span> 獲得
                                                </div>
                                                <div class="mt-1">
                                                    <span class="text-gold fw-bold fs-4">100,000</span> 
                                                    <span class="text-white">Hilton積分</span><br>
                                                    <span class="text-gold fw-bold">+ $100</span> 
                                                    <span class="text-white small">帳單抵扣</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- 年費與權益 -->
                                        <div class="card-body py-3">
                                            <div class="row g-2 mb-3">
                                                <div class="col-6">
                                                    <div class="text-center p-2 rounded" style="background: rgba(255,255,255,0.1);">
                                                        <div class="text-gold small fw-bold">年費</div>
                                                        <div class="text-white fw-bold">$0</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-center p-2 rounded" style="background: rgba(255,255,255,0.1);">
                                                        <div class="text-gold small fw-bold">主要倍數</div>
                                                        <div class="text-white fw-bold">7X 希爾頓</div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="text-center">
                                                <div class="text-gold fw-bold mb-2">核心權益</div>
                                                <div class="small text-white lh-sm">
                                                    <div>• 希爾頓酒店 7X 積分</div>
                                                    <div>• 美國餐廳/超市/加油站 5X</div>
                                                    <div>• 自動 Hilton Silver 會籍</div>
                                                    <div>• 無境外交易手續費</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flip-hint">
                                        <i class="bi bi-info-circle"></i> 點擊右上角按鈕查看詳情
                                    </div>
                                </div>
                                
                                <!-- 卡片背面 -->
                                <div class="flip-card-back">
                                    <h4 class="text-gold mb-4">希爾頓專屬權益</h4>
                                    
                                    <div class="row g-3 text-start">
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-building me-2"></i>酒店權益</h6>
                                                <ul class="mb-0 small">
                                                    <li>希爾頓酒店住宿：7X 積分</li>
                                                    <li>自動 Hilton Silver 菁英會籍</li>
                                                    <li>年消費$20k升級 Gold 會籍</li>
                                                    <li>免費WiFi與房型升等</li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-credit-card me-2"></i>消費回饋</h6>
                                                <ul class="mb-0 small">
                                                    <li>美國餐廳：5X 積分</li>
                                                    <li>美國超市：5X 積分</li>
                                                    <li>美國加油站：5X 積分</li>
                                                    <li>其他消費：3X 積分</li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-star me-2"></i>專屬禮遇</h6>
                                                <ul class="mb-0 small">
                                                    <li>AmEx Offer商家折扣</li>
                                                    <li>推薦朋友每成功得20k積分</li>
                                                    <li>無境外交易手續費</li>
                                                    <li>持續消費，積分將永不過期</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <a href="#consultation" class="btn btn-gold w-100">立即諮詢申請</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chase 精選系列 -->
            <div class="mt-5 mb-5 pb-3" data-aos="fade-up">
                <div class="row">
                    <div class="col-12">
                        <h3 class="card-group-heading">Chase <span class="text-gold">精選系列</span></h3>
                        <p class="lead mb-4">摩根大通銀行精選信用卡，涵蓋旅行、酒店與高端消費體驗</p>
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    <!-- Chase IHG Premier Card -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="flip-card">
                            <div class="flip-toggle-btn">+</div>
                            <div class="flip-card-inner">
                                <!-- 卡片正面 -->
                                <div class="flip-card-front">
                                    <div class="card h-100">
                                        <!-- 卡片標題 -->
                                        <div class="card-header text-center py-3">
                                            <h5 class="mb-0 text-gold fw-bold">Chase IHG One Rewards Premier®</h5>
                                            <small class="text-light">洲際酒店卡</small>
                                        </div>
                                        
                                        <!-- 卡片圖片 -->
                                        <div class="text-center py-3" style="background: rgba(255,255,255,0.05);">
                                            <img src="./img/chase_1.png" alt="Chase IHG Premier Card" class="img-fluid" style="max-width: 180px; border-radius: 10px;">
                                        </div>
                                        
                                        <!-- 開卡禮區塊 -->
                                        <div class="px-3 py-2" style="background: rgba(255, 215, 0, 0.1); border-top: 1px solid rgba(255, 215, 0, 0.3); border-bottom: 1px solid rgba(255, 215, 0, 0.3);">
                                            <div class="text-center">
                                                <div class="text-gold fw-bold mb-1">開卡禮</div>
                                                <div class="text-white small">
                                                    前3個月消費 <span class="text-gold fw-bold">$5,000</span> 獲得
                                                </div>
                                                <div class="mt-1">
                                                    <span class="text-gold fw-bold fs-4">5張免費住宿券</span>
                                                    <div class="text-light small">(每張up to 60k點數)</div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- 年費與權益 -->
                                        <div class="card-body py-3">
                                            <div class="row g-2 mb-3">
                                                <div class="col-6">
                                                    <div class="text-center p-2 rounded" style="background: rgba(255,255,255,0.1);">
                                                        <div class="text-gold small fw-bold">年費</div>
                                                        <div class="text-white fw-bold">$99</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-center p-2 rounded" style="background: rgba(255,255,255,0.1);">
                                                        <div class="text-gold small fw-bold">主要倍數</div>
                                                        <div class="text-white fw-bold">10X IHG</div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="text-center">
                                                <div class="text-gold fw-bold mb-2">核心權益</div>
                                                <div class="small text-white lh-sm">
                                                    <div>• IHG酒店 10X 積分</div>
                                                    <div>• 旅行/餐飲/加油 5X 積分</div>
                                                    <div>• 自動白金菁英會籍</div>
                                                    <div>• 年度$50 UA TravelBank</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flip-hint">
                                        <i class="bi bi-info-circle"></i> 點擊右上角按鈕查看詳情
                                    </div>
                                </div>
                                
                                <!-- 卡片背面 -->
                                <div class="flip-card-back">
                                    <h4 class="text-gold mb-4">IHG 酒店專屬權益</h4>
                                    
                                    <div class="row g-3 text-start">
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-building me-2"></i>酒店權益</h6>
                                                <ul class="mb-0 small">
                                                    <li>IHG酒店住宿：10X 積分</li>
                                                    <li>自動IHG白金菁英會籍</li>
                                                    <li>年度免費住宿券(up to 40k)</li>
                                                    <li>消費$40k升級鑽石會籍</li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-credit-card me-2"></i>消費回饋</h6>
                                                <ul class="mb-0 small">
                                                    <li>旅行消費：5X 積分</li>
                                                    <li>餐廳消費：5X 積分</li>
                                                    <li>加油站：5X 積分</li>
                                                    <li>其他消費：3X 積分</li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-star me-2"></i>特殊福利</h6>
                                                <ul class="mb-0 small">
                                                    <li>年度$50 UA TravelBank</li>
                                                    <li>年消費$20k送10k積分+$100積分</li>
                                                    <li>$800手機保險保障</li>
                                                    <li>Global Entry/TSA PreCheck $100</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <a href="#consultation" class="btn btn-gold w-100">立即諮詢申請</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chase Sapphire Preferred Card -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="flip-card">
                            <div class="flip-toggle-btn">+</div>
                            <div class="flip-card-inner">
                                <!-- 卡片正面 -->
                                <div class="flip-card-front">
                                    <div class="card h-100">
                                        <!-- 卡片標題 -->
                                        <div class="card-header text-center py-3">
                                            <h5 class="mb-0 text-gold fw-bold">Chase Sapphire Preferred®</h5>
                                            <small class="text-light">藍寶石優選卡</small>
                                        </div>
                                        
                                        <!-- 卡片圖片 -->
                                        <div class="text-center py-3" style="background: rgba(255,255,255,0.05);">
                                            <img src="./img/chase_2.png" alt="Chase Sapphire Preferred Card" class="img-fluid" style="max-width: 180px; border-radius: 10px;">
                                        </div>
                                        
                                        <!-- 開卡禮區塊 -->
                                        <div class="px-3 py-2" style="background: rgba(255, 215, 0, 0.1); border-top: 1px solid rgba(255, 215, 0, 0.3); border-bottom: 1px solid rgba(255, 215, 0, 0.3);">
                                            <div class="text-center">
                                                <div class="text-gold fw-bold mb-1">開卡禮</div>
                                                <div class="text-white small">
                                                    前3個月消費 <span class="text-gold fw-bold">$4,000</span> 獲得
                                                </div>
                                                <div class="mt-1">
                                                    <span class="text-gold fw-bold fs-4">60,000</span> 
                                                    <span class="text-white">UR點數</span><br>
                                                    <small class="text-light">(近期最高100k)</small>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- 年費與權益 -->
                                        <div class="card-body py-3">
                                            <div class="row g-2 mb-3">
                                                <div class="col-6">
                                                    <div class="text-center p-2 rounded" style="background: rgba(255,255,255,0.1);">
                                                        <div class="text-gold small fw-bold">年費</div>
                                                        <div class="text-white fw-bold">$95</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-center p-2 rounded" style="background: rgba(255,255,255,0.1);">
                                                        <div class="text-gold small fw-bold">主要倍數</div>
                                                        <div class="text-white fw-bold">2X 旅行</div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="text-center">
                                                <div class="text-gold fw-bold mb-2">核心權益</div>
                                                <div class="small text-white lh-sm">
                                                    <div>• Chase旅遊平台 5X 點數</div>
                                                    <div>• 餐飲/流媒體/網購 3X 點數</div>
                                                    <div>• 年度$50酒店報銷</div>
                                                    <div>• 年度10% Bonus</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flip-hint">
                                        <i class="bi bi-info-circle"></i> 點擊右上角按鈕查看詳情
                                    </div>
                                </div>
                                
                                <!-- 卡片背面 -->
                                <div class="flip-card-back">
                                    <h4 class="text-gold mb-4">Chase Ultimate Rewards</h4>
                                    
                                    <div class="row g-3 text-start">
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-airplane me-2"></i>消費回饋</h6>
                                                <ul class="mb-0 small">
                                                    <li>Chase旅遊平台：5X UR點數</li>
                                                    <li>餐廳/流媒體/網購：3X UR點數</li>
                                                    <li>其他旅行消費：2X UR點數</li>
                                                    <li>其他消費：1X UR點數</li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-arrow-repeat me-2"></i>UR點數權益</h6>
                                                <ul class="mb-0 small">
                                                    <li>轉至航空/酒店夥伴：1:1比例</li>
                                                    <li>Chase旅遊平台：1.25¢/點</li>
                                                    <li>Pay Yourself Back：1.25¢/點</li>
                                                    <li>年度10% Bonus回饋</li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-shield-check me-2"></i>附加福利</h6>
                                                <ul class="mb-0 small">
                                                    <li>年度$50酒店報銷</li>
                                                    <li>Primary租車保險</li>
                                                    <li>無境外交易手續費</li>
                                                    <li>旅行保險與保障</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <a href="#consultation" class="btn btn-gold w-100">立即諮詢申請</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chase Ritz-Carlton Card -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="flip-card">
                            <div class="flip-toggle-btn">+</div>
                            <div class="flip-card-inner">
                                <!-- 卡片正面 -->
                                <div class="flip-card-front">
                                    <div class="card h-100">
                                        <!-- 卡片標題 -->
                                        <div class="card-header text-center py-3">
                                            <h5 class="mb-0 text-gold fw-bold">The Ritz-Carlton Credit Card®</h5>
                                            <small class="text-light">麗思卡爾頓卡</small>
                                        </div>
                                        
                                        <!-- 卡片圖片 -->
                                        <div class="text-center py-3" style="background: rgba(255,255,255,0.05);">
                                            <img src="./img/chase_3.png" alt="Chase Ritz-Carlton Card" class="img-fluid" style="max-width: 180px; border-radius: 10px;">
                                        </div>
                                        
                                        <!-- 開卡禮區塊 -->
                                        <div class="px-3 py-2" style="background: rgba(255, 215, 0, 0.1); border-top: 1px solid rgba(255, 215, 0, 0.3); border-bottom: 1px solid rgba(255, 215, 0, 0.3);">
                                            <div class="text-center">
                                                <div class="text-gold fw-bold mb-1">開卡禮</div>
                                                <div class="text-white small">
                                                    無開卡禮
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- 年費與權益 -->
                                        <div class="card-body py-3">
                                            <div class="row g-2 mb-3">
                                                <div class="col-6">
                                                    <div class="text-center p-2 rounded" style="background: rgba(255,255,255,0.1);">
                                                        <div class="text-gold small fw-bold">年費</div>
                                                        <div class="text-white fw-bold">$450</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-center p-2 rounded" style="background: rgba(255,255,255,0.1);">
                                                        <div class="text-gold small fw-bold">主要倍數</div>
                                                        <div class="text-white fw-bold">6X 萬豪</div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="text-center">
                                                <div class="text-gold fw-bold mb-2">核心權益</div>
                                                <div class="small text-white lh-sm">
                                                    <div>• 萬豪酒店 6X 點數</div>
                                                    <div>• 年度$300航空報銷</div>
                                                    <div>• 自動萬豪金卡會籍</div>
                                                    <div>• Priority Pass Select</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flip-hint">
                                        <i class="bi bi-info-circle"></i> 點擊右上角按鈕查看詳情
                                    </div>
                                </div>
                                
                                <!-- 卡片背面 -->
                                <div class="flip-card-back">
                                    <h4 class="text-gold mb-4">麗思卡爾頓尊榮</h4>
                                    
                                    <div class="row g-3 text-start">
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-gem me-2"></i>酒店權益</h6>
                                                <ul class="mb-0 small">
                                                    <li>萬豪酒店：6X Marriott點數</li>
                                                    <li>自動萬豪金卡菁英會籍</li>
                                                    <li>年度免費住宿券(up to 85k)</li>
                                                    <li>消費$75k升級白金會籍</li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-credit-card me-2"></i>消費回饋</h6>
                                                <ul class="mb-0 small">
                                                    <li>餐廳消費：3X Marriott點數</li>
                                                    <li>機票消費：3X Marriott點數</li>
                                                    <li>租車消費：3X Marriott點數</li>
                                                    <li>其他消費：2X Marriott點數</li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                                <h6 class="text-gold"><i class="bi bi-star-fill me-2"></i>專屬禮遇</h6>
                                                <ul class="mb-0 small">
                                                    <li>年度$300航空費用報銷</li>
                                                    <li>$100麗思卡爾頓酒店費用報銷</li>
                                                    <li>Priority Pass Select貴賓室</li>
                                                    <li>15個菁英夜數積分</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <a href="#consultation" class="btn btn-gold w-100">立即諮詢申請</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 活動紀錄 -->
    <section id="events" class="py-5 bg-gradient-dark">
        <div class="container">
            <h2 class="text-center mb-5 text-white" data-aos="fade-up">
                <span class="text-gold">活動</span>紀錄
            </h2>
            
            <!-- 活動時間軸 -->
            <div class="timeline">
                <!-- 台中萬楓酒店活動 -->
                <div class="timeline-item" data-aos="fade-up">
                    <div class="timeline-date">
                        <span class="date">19</span>
                        <span class="month">APR</span>
                        <span class="year">2025</span>
                    </div>
                    <div class="timeline-content">
                        <div class="event-gallery">
                            <div class="swiper gallerySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="gallery-item">
                                            <img src="./img/0419.JPG" alt="台中萬楓酒店活動照片">
                                            <div class="gallery-overlay">
                                                <span>開場致詞</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="gallery-item">
                                            <img src="./img/0419_1.JPG" alt="台中萬楓酒店活動照片">
                                            <div class="gallery-overlay">
                                                <span>專家分享環節</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="gallery-item">
                                            <img src="./img/0419_2.JPG" alt="台中萬楓酒店活動照片">
                                            <div class="gallery-overlay">
                                                <span>交流討論</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="gallery-item">
                                            <img src="./img/0419_3.JPG" alt="台中萬楓酒店活動照片">
                                            <div class="gallery-overlay">
                                                <span>交流討論</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="event-details">
                            <div class="event-header">
                                <h3>信用卡達人講座 - 台中萬楓酒店</h3>
                            </div>
                            <p class="event-description">
                                本次活動邀請到多位信用卡領域專家，深入探討美國信用卡的進階使用技巧。現場氣氛熱烈，參與者踴躍提問，專家們也分享了許多實用的個案分析。
                            </p>
                            <div class="event-highlights">
                                <h4>活動亮點</h4>
                                <ul>
                                    <li>信用卡組合最佳化策略分享</li>
                                    <li>高端酒店住宿權益解析</li>
                                    <li>進階使用技巧分享</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 台北駭客餐酒館活動 -->
                <div class="timeline-item" data-aos="fade-up">
                    <div class="timeline-date">
                        <span class="date">23</span>
                        <span class="month">MAR</span>
                        <span class="year">2025</span>
                    </div>
                    <div class="timeline-content">
                        <div class="event-gallery">
                            <div class="swiper gallerySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="gallery-item">
                                            <img src="./img/0323.JPG" alt="台北駭客餐酒館活動照片">
                                            <div class="gallery-overlay">
                                                <span>科技主題布置</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="gallery-item">
                                            <img src="./img/0323_1.JPG" alt="台北駭客餐酒館活動照片">
                                            <div class="gallery-overlay">
                                                <span>互動遊戲環節</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="gallery-item">
                                            <img src="./img/0323_2.JPG" alt="台北駭客餐酒館活動照片">
                                            <div class="gallery-overlay">
                                                <span>餐飲交流時間</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="gallery-item">
                                            <img src="./img/0323_3.JPG" alt="台北駭客餐酒館活動照片">
                                            <div class="gallery-overlay">
                                                <span>餐飲交流時間</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="event-details">
                            <div class="event-header">
                                <h3>信用卡攻略講座 - 台北駭客餐酒館</h3>
                            </div>
                            <p class="event-description">
                                在充滿科技感的駭客餐酒館舉辦的這場講座，以輕鬆互動的方式帶領參與者了解信用卡優惠策略。現場還設計了多個互動遊戲，讓參與者在遊戲中學習。
                            </p>
                            <div class="event-highlights">
                                <h4>活動亮點</h4>
                                <ul>
                                    <li>信用卡積分攻略遊戲</li>
                                    <li>餐飲優惠最大化分享</li>
                                    <li>科技感主題布置</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 高雄萬豪酒店活動 -->
                <div class="timeline-item" data-aos="fade-up">
                    <div class="timeline-date">
                        <span class="date">15</span>
                        <span class="month">MAR</span>
                        <span class="year">2025</span>
                    </div>
                    <div class="timeline-content">
                        <div class="event-gallery">
                            <div class="swiper gallerySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="gallery-item">
                                            <img src="./img/0315.JPG" alt="高雄萬豪酒店活動照片">
                                            <div class="gallery-overlay">
                                                <span>精緻茶點</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="gallery-item">
                                            <img src="./img/0315_1.jpg" alt="高雄萬豪酒店活動照片">
                                            <div class="gallery-overlay">
                                                <span>專家演講</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="gallery-item">
                                            <img src="./img/0315_2.JPG" alt="高雄萬豪酒店活動照片">
                                            <div class="gallery-overlay">
                                                <span>貴賓室導覽</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="event-details">
                            <div class="event-header">
                                <h3>信用卡優惠饗宴 - 高雄萬豪酒店</h3>
                            </div>
                            <p class="event-description">
                                在高雄萬豪酒店舉辦的這場活動，除了分享信用卡知識外，還特別安排了酒店設施導覽，讓參與者深入了解各項服務與優惠。
                            </p>
                            <div class="event-highlights">
                                <h4>活動亮點</h4>
                                <ul>
                                    <li>萬豪會員制度解析</li>
                                    <li>信用卡優惠講解</li>
                                    <li>精緻下午茶體驗</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 服務介紹 -->
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">
                <span class="text-gold">精品套裝</span>服務
            </h2>
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                    <h3 class="mb-3">玩賺世界的哩程</h3>
                    <p class="lead">從選卡、核卡、開通、刷卡技巧、權益使用、甚至售後客服，我們都不缺席。這不只是「一張卡」的服務，而是一段「玩賺世界的哩程」</p>
                </div>
            </div>
            <div class="row g-4">
                <!-- 第一排三張卡片 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card service-card h-100">
                        <div class="card-body text-center">
                            <div class="service-icon">
                                <i class="bi bi-credit-card-2-front fs-1"></i>
                            </div>
                            <h5 class="card-title">信用卡建議與申辦</h5>
                            <p class="card-text">與您深入討論，制定最適合您的持卡策略，並協助完成申請流程，提高核卡成功率。</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card service-card h-100">
                        <div class="card-body text-center">
                            <div class="service-icon">
                                <i class="bi bi-file-earmark-text fs-1"></i>
                            </div>
                            <h5 class="card-title">ITIN申辦服務</h5>
                            <p class="card-text">協助您申請美國個人納稅識別號碼(ITIN)，為信用卡申請奠定基礎，簡化繁瑣流程。</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card service-card h-100">
                        <div class="card-body text-center">
                            <div class="service-icon">
                                <i class="bi bi-geo-alt fs-1"></i>
                            </div>
                            <h5 class="card-title">美國地址租借</h5>
                            <p class="card-text">提供合法可用的美國實體地址，用於信用卡申請和接收卡片，確保您的郵件安全送達。</p>
                        </div>
                    </div>
                </div>
                <!-- 第二排兩張卡片，使用 justify-content-center -->
                <div class="row g-4 justify-content-center">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="card service-card h-100">
                            <div class="card-body text-center">
                                <div class="service-icon">
                                    <i class="bi bi-telephone fs-1"></i>
                                </div>
                                <h5 class="card-title">美國電話申辦</h5>
                                <p class="card-text">協助您獲取美國電話號碼，用於信用卡申請驗證和日常使用，支持短信和來電轉接。</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="card service-card h-100">
                            <div class="card-body text-center">
                                <div class="service-icon">
                                    <i class="bi bi-bank fs-1"></i>
                                </div>
                                <h5 class="card-title">美國銀行帳戶申辦</h5>
                                <p class="card-text">遠端視訊即可完成美國銀行帳戶開戶，為信用卡還款和資金管理提供便利。</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 底部大卡片 -->
                <div class="col-12 mt-5" data-aos="fade-up" data-aos-delay="600">
                    <div class="card service-card h-100 bg-gradient-dark text-white premium-service-card" style="border: 3px solid var(--gold-color);">
                        <div class="card-body p-5">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-center">
                                    <div class="service-icon" style="background: var(--gold-color); color: var(--primary-color); width: 120px; height: 120px; margin-bottom: 15px;">
                                        <i class="bi bi-stars" style="font-size: 3rem;"></i>
                                    </div>
                                    <div class="badge bg-gold text-dark p-2 fs-6">熱門選擇</div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="card-title text-gold" style="font-size: 2rem; margin-bottom: 1rem;">全程陪伴服務</h4>
                        <p class="card-text" style="font-size: 1.2rem;">整合以上所有服務，提供全程陪伴的玩賺世界哩程。從選卡諮詢、ITIN申辦、美國地址租借、電話申辦到銀行帳戶開設，我們陪您走過每一個哩程碑，直到您熟練掌握所有使用技巧。</p>
                        <div class="mt-3 p-3 rounded" style="background: rgba(255,255,255,0.1); border-left: 4px solid var(--gold-color);">
                            <small class="text-warning fw-medium">
                                <i class="bi bi-info-circle me-2"></i>
                                申請卡片時，都會跟客人討論，以客人的需求為主，適時引導出客人最佳效益與方向。前置作業也會依據絕對必要的程序做準備，事半功倍，且客人無憂為宗旨。
                            </small>
                        </div>
                                </div>
                                <div class="col-md-3 text-center">
                                    <a href="https://line.me/ti/p/@927ukytp" class="btn btn-gold btn-lg mt-3 w-100 p-3" target="_blank" style="font-size: 1.2rem;color: white;">立即諮詢</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 客戶評價 -->
    <section id="testimonials" class="py-5 bg-gradient-dark">
        <div class="container">
            <h2 class="text-center mb-5 text-white" data-aos="fade-up">
                <span class="text-gold">客戶</span>評價
            </h2>
            <div class="row g-4">
                <!-- 評價卡片1 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card h-100">
                        <div class="testimonial-content">
                            <div class="stars mb-3">
                                <span class="text-gold">★★★★★</span>
                            </div>
                            <p class="testimonial-text">
                                "從一開始不懂信用卡到現在已經成功申請了三張卡，團隊的專業度真的很令人驚艷。不只幫我選到最適合的卡片組合，還教我如何最大化使用權益。"
                            </p>
                            <div class="testimonial-author">
                                <div class="author-info">
                                    <h6 class="author-name">王先生</h6>
                                    <small class="author-title">軟體工程師</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 評價卡片2 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card h-100">
                        <div class="testimonial-content">
                            <div class="stars mb-3">
                                <span class="text-gold">★★★★★</span>
                            </div>
                            <p class="testimonial-text">
                                "本來擔心申請美國信用卡會很複雜，但團隊從ITIN申請到地址服務都幫我處理得很完善。現在每次出國旅行都能享受到很多優惠，真的很感謝！"
                            </p>
                            <div class="testimonial-author">
                                <div class="author-info">
                                    <h6 class="author-name">李小姐</h6>
                                    <small class="author-title">行銷專員</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 評價卡片3 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-card h-100">
                        <div class="testimonial-content">
                            <div class="stars mb-3">
                                <span class="text-gold">★★★★★</span>
                            </div>
                            <p class="testimonial-text">
                                "售後服務真的很棒！申請成功後還會主動提醒我各種優惠活動和使用技巧。這不只是申請信用卡的服務，更像是有了專屬的信用卡顧問。"
                            </p>
                            <div class="testimonial-author">
                                <div class="author-info">
                                    <h6 class="author-name">陳先生</h6>
                                    <small class="author-title">外商主管</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 評價卡片4 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="testimonial-card h-100">
                        <div class="testimonial-content">
                            <div class="stars mb-3">
                                <span class="text-gold">★★★★★</span>
                            </div>
                            <p class="testimonial-text">
                                "透過他們的建議，我的旅行成本降低了至少30%！酒店升等、機場貴賓室、還有各種消費回饋，現在出差都變成一種享受了。"
                            </p>
                            <div class="testimonial-author">
                                <div class="author-info">
                                    <h6 class="author-name">張小姐</h6>
                                    <small class="author-title">業務經理</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 評價卡片5 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="testimonial-card h-100">
                        <div class="testimonial-content">
                            <div class="stars mb-3">
                                <span class="text-gold">★★★★★</span>
                            </div>
                            <p class="testimonial-text">
                                "最讓我印象深刻的是他們的耐心和專業。會針對我的消費習慣和需求做詳細分析，推薦的卡片組合真的很適合我，現在積分累積速度超快！"
                            </p>
                            <div class="testimonial-author">
                                <div class="author-info">
                                    <h6 class="author-name">林先生</h6>
                                    <small class="author-title">醫師</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 評價卡片6 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="testimonial-card h-100">
                        <div class="testimonial-content">
                            <div class="stars mb-3">
                                <span class="text-gold">★★★★★</span>
                            </div>
                            <p class="testimonial-text">
                                "選擇他們是我做過最正確的決定！不只成功申請到理想的信用卡，還學到了很多理財和旅行的技巧。真正做到了「玩賺世界」！"
                            </p>
                            <div class="testimonial-author">
                                <div class="author-info">
                                    <h6 class="author-name">黃小姐</h6>
                                    <small class="author-title">會計師</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 聯絡我們 -->
    <section id="contact" class="contact-section">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">
                <span class="text-gold">聯絡</span>我們
            </h2>
            
            <!-- LINE 聯絡按鈕 -->
            <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="col-md-6 text-center">
                    <div class="line-contact-section p-4 rounded" style="background: rgba(255,255,255,0.1); border: 2px solid var(--gold-color);">
                        <h4 class="text-gold mb-3">
                            <i class="bi bi-line me-2"></i>
                            LINE 快速聯絡
                        </h4>
                        <p class="text-light mb-4">立即透過 LINE 與我們聯繫，獲得即時專業諮詢服務</p>
                        <a href="https://line.me/ti/p/@927ukytp" 
                           target="_blank" 
                           class="btn btn-gold btn-lg px-5 py-3 d-inline-flex align-items-center" 
                           style="background: var(--gold-color); border-color: var(--gold-color); color: var(--primary-color); box-shadow: 0 4px 15px rgba(197, 165, 114, 0.3); font-size: 1.1rem;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2">
                                <path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63h2.386c.349 0 .63.285.63.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63.349 0 .631.285.631.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.348 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.281.628-.629.628M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314" fill="currentColor"/>
                            </svg>
                            加入 LINE 好友
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10" data-aos="fade-up">
                    <div class="contact-card p-5">
                        <!-- 聯絡方式 -->
                    
                        
                        <!-- 預約諮詢表單 -->
                        <div>
                            <h4 class="mb-4 text-gold text-center">預約諮詢</h4>
                            <form class="contact-form">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="姓名" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="tel" class="form-control" placeholder="電話" required>
                                    </div>
                                    <div class="col-12">
                                        <input type="email" class="form-control" placeholder="電子郵件" required>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-select" required>
                                            <option value="">選擇預約時段</option>
                                            <option>上午 (09:00-12:00)</option>
                                            <option>下午 (14:00-17:00)</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" rows="4" placeholder="諮詢內容或想了解的信用卡類型" required></textarea>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-outline-light hover-gold px-5 py-3" style="min-width: 200px;">
                                            <i class="bi bi-send me-2"></i>
                                            送出預約
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 新的 footer 設計 -->
    <footer class="footer-section py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-brand mb-4">
                        <img src="logo.png" alt="Logo" height="40" class="mb-3">
                        <h5 class="text-white">美國信用卡玩賺世界</h5>
                        <p class="text-light-gray">一群對服務吹毛求疵的信用卡顧問組成，與您共同踏上玩賺世界的哩程</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-gold mb-4">快速連結</h5>
                    <ul class="footer-links">
                        <li><a href="#home">首頁</a></li>
                        <li><a href="#about">關於我們</a></li>
                        <li><a href="#cards">信用卡推薦</a></li>
                        <li><a href="#consultation">諮詢服務</a></li>
                        <li><a href="#events">活動報名</a></li>
                        <li><a href="#testimonials">客戶評價</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-gold mb-4">聯絡資訊</h5>
                    <ul class="footer-contact">
                        <li>
                            <i class="bi bi-line"></i>
                            <span>@927ukytp</span>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="copyright mb-0">
                            © 2025 美國信用卡玩賺世界. All rights reserved.
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="footer-links-bottom">
                            <a href="#">隱私政策</a>
                            <a href="#">服務條款</a>
                            <a href="#">Cookie 政策</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- 在 Bootstrap JS 之前加入 Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- 在 AOS.init() 之前加入 Swiper 初始化程式碼 -->
    <script>
        // 初始化 AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // 自動計算導覽列高度
        const navbar = document.querySelector('.navbar');
        const updateNavbarHeight = () => {
            const height = navbar.offsetHeight;
            document.documentElement.style.setProperty('--navbar-height', height + 'px');
        };
        
        updateNavbarHeight();
        window.addEventListener('resize', updateNavbarHeight);

        // Swiper 初始化
        const swiperOptions = {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            speed: 800,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            effect: "slide",
            preloadImages: false,
            lazy: {
                loadPrevNext: true,
                loadPrevNextAmount: 2
            },
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
            touchRatio: 1,
            touchAngle: 45,
            grabCursor: true,
            observer: true,
            observeParents: true,
            releaseFormElements: true,
            mousewheel: false,
            preventInteractionOnTransition: true
        };

        document.querySelectorAll('.gallerySwiper').forEach(slider => {
            new Swiper(slider, swiperOptions);
        });

        // 卡片標題高度對齊功能
        function alignCardHeaders() {
            // 處理所有卡片組
            const cardGroups = document.querySelectorAll('.row.g-4.justify-content-center');
            
            cardGroups.forEach(group => {
                const cardHeaders = group.querySelectorAll('.card-header');
                
                if (cardHeaders.length > 0) {
                    // 重置高度
                    cardHeaders.forEach(header => {
                        header.style.minHeight = 'auto';
                    });
                    
                    // 計算最大高度
                    let maxHeight = 0;
                    cardHeaders.forEach(header => {
                        const height = header.offsetHeight;
                        if (height > maxHeight) {
                            maxHeight = height;
                        }
                    });
                    
                    // 設置統一最小高度
                    cardHeaders.forEach(header => {
                        header.style.minHeight = maxHeight + 'px';
                    });
                }
            });
        }

        // 頁面載入完成後執行
        document.addEventListener('DOMContentLoaded', alignCardHeaders);
        
        // 視窗大小改變時重新對齊
        window.addEventListener('resize', alignCardHeaders);
        
        // AOS 動畫完成後也執行一次對齊
        setTimeout(alignCardHeaders, 1500);

        // 翻轉卡片功能
        document.addEventListener('DOMContentLoaded', function() {
            const flipButtons = document.querySelectorAll('.flip-toggle-btn');
            
            flipButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const flipCard = this.closest('.flip-card');
                    const isFlipped = flipCard.classList.contains('flipped');
                    
                    if (isFlipped) {
                        // 翻回正面
                        flipCard.classList.remove('flipped');
                        this.textContent = '+';
                    } else {
                        // 翻到背面
                        flipCard.classList.add('flipped');
                        this.textContent = '−';
                    }
                });
            });
        });
    </script>
</body>

</html>
