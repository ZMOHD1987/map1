<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نموذج التفتيش الموحد</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        :root {
            --primary-color: #28a745;
            --secondary-bg: #e8f5e9;
            --card-bg: #ffffff;
            --text-color: #333;
            --border-color: #ddd;
            --focus-color: #1a7a3b;
            --shadow-light: rgba(0, 0, 0, 0.08);
        }

        body {
            font-family: 'Cairo', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--secondary-bg);
            color: var(--text-color);
            direction: rtl;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: var(--card-bg);
            border-radius: 8px;
            box-shadow: 0 4px 10px var(--shadow-light);
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 15px;
            margin-bottom: 20px;
            border-bottom: 2px solid var(--primary-color);
        }
        
        .header img {
            height: 60px;
        }
        
        .header-text {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            color: #1a7a3b;
            font-weight: bold;
        }
        
        .header-text .main-title {
            font-size: 1.2em;
            margin-bottom: 2px;
        }
        
        .header-text .sub-title {
            font-size: 0.9em;
            color: #4CAF50;
        }
        
        h1 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 30px;
            font-size: 2em;
        }

        .form-section {
            background-color: var(--card-bg);
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px var(--shadow-light);
            border: 1px solid var(--border-color);
        }
        
        .form-section h3 {
            color: var(--primary-color);
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 10px;
            margin-bottom: 15px;
            font-size: 1.3em;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            margin-bottom: 5px;
            display: block;
            font-weight: bold;
            color: #555;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            box-sizing: border-box;
            font-family: 'Cairo', sans-serif;
        }
        
        input[type="date"] {
            direction: rtl;
        }
        
        input:focus, select:focus, textarea:focus {
            border-color: var(--focus-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(40, 167, 69, 0.2);
        }
        
        .readonly {
            background-color: #f5f5f5;
            cursor: not-allowed;
        }
        
        #message {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            display: none;
        }
        
        .success {
            background-color: #e8f5e9;
            border: 1px solid var(--primary-color);
            color: var(--focus-color);
        }
        
        .error {
            background-color: #ffe6e6;
            border: 1px solid #dc3545;
            color: #c82333;
        }
        
        .search-area {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .search-area input {
            flex-grow: 1;
        }
        
        button {
            padding: 10px 20px;
            background-color: var(--primary-color); /* Primary button style */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            display: flex;
            align-items: center;
            transition: all 0.2s;
        }
        
        button:hover {
            background-color: var(--focus-color);
            transform: translateY(-2px);
        }
        
        button i {
            margin-left: 8px;
        }
        
        /* Specific button styles */
        .search-btn {
            background-color: #ffc107;
            color: #333;
        }
        
        .search-btn:hover {
            background-color: #e0a800;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        
        .item-row {
            border: 1px solid #eee;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        
        .item-row p {
            margin: 0 0 10px 0;
        }
        
        .violation-details {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px dashed #ccc;
            /* display: none; will be controlled by JS */
        }
        
        .results-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
        
        .result-item {
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        
        .result-item strong {
            display: block;
            margin-bottom: 5px;
            color: var(--primary-color);
        }

        .previous-violation-indicator {
            background-color: #ffe0b2; /* Light orange */
            color: #e65100; /* Darker orange */
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.8em;
            font-weight: bold;
            margin-right: 10px;
            display: inline-block;
            float: left; /* Align to the left (visual right in RTL) */
        }

        .item-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .item-header p {
            margin: 0;
            flex-grow: 1;
        }

        .violation-toggle-group {
            display: flex;
            align-items: center;
            gap: 10px;
            white-space: nowrap;
        }

        /* New styles for button groups */
        .button-group {
            display: flex;
            gap: 10px; /* Space between buttons */
            flex-wrap: wrap; /* Allow wrapping on smaller screens */
            margin-top: 20px;
            justify-content: flex-end; /* Align to the right in RTL */
        }

        .button-group button {
            margin-top: 0; /* Override default margin-top from generic button style */
            flex-grow: 1; /* Allow buttons to grow */
            text-align: center;
        }
        @media (min-width: 768px) {
            .button-group button {
                flex-grow: 0; /* Disable growing on larger screens */
                width: auto; /* Reset width */
            }
        }
        
        /* Ensure the register new establishment button is full width when shown */
        #registerEstablishmentBtn {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 20px;
            padding: 15px;
            font-size: 1.1em;
        }

        /* Utility class to hide elements */
        .hidden {
            display: none;
        }

        /* Toggle switch styling */
        .switch {
            position: relative;
            display: inline-block;
            width: 45px; /* Adjusted width for better appearance */
            height: 25px; /* Adjusted height */
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 25px; /* Make it round */
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 19px; /* Adjusted size */
            width: 19px; /* Adjusted size */
            left: 3px; /* Adjusted position */
            bottom: 3px; /* Adjusted position */
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%; /* Make it round */
        }

        input:checked + .slider {
            background-color: var(--primary-color);
        }

        input:focus + .slider {
            box-shadow: 0 0 1px var(--primary-color);
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(20px); /* Adjusted translation */
            -ms-transform: translateX(20px); /* Adjusted translation */
            transform: translateX(20px); /* Adjusted translation */
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
                margin: 10px;
            }
            
            .form-grid, .results-grid {
                grid-template-columns: 1fr;
            }
            
            .search-area {
                flex-direction: column;
            }
            .item-header {
                flex-direction: column;
                align-items: flex-start;
            }
            .violation-toggle-group {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="shjmunlogo.png" alt="شعار البلدية">
            <div class="header-text">
                <span class="main-title">إدارة الرقابة والسلامة الصحية</span>
                <span class="sub-title">قسم الرقابة الغذائية</span>
            </div>
        </div>

        <h1>نموذج التفتيش الموحد</h1>

        <div id="message" class="hidden"></div>

        <div class="form-section" id="searchSection">
            <h3>1. البحث عن المنشأة</h3>
            <div class="search-area">
                <input type="text" id="licenseNo" placeholder="أدخل رقم الرخصة">
                <button id="searchBtn" class="search-btn"><i class="fas fa-search"></i> بحث</button>
            </div>
            
            <button type="button" class="btn-primary hidden" id="registerEstablishmentBtn">
                <i class="fas fa-plus"></i> تسجيل منشأة جديدة
            </button>

            <div id="facilitySelection" class="form-group hidden">
                <label for="facilitySelector">اختر المنشأة:</label>
                <select id="facilitySelector">
                    <option value="">-- اختر منشأة --</option>
                </select>
            </div>

            <div id="facilityInfo" class="hidden">
                <div class="form-grid">
                    <div class="form-group">
                        <label>اسم المنشأة</label>
                        <input type="text" id="facilityName" readonly class="readonly">
                    </div>
                    <div class="form-group">
                        <label>رقم الرخصة</label>
                        <input type="text" id="licenseNumberDisplay" readonly class="readonly">
                    </div>
                    <div class="form-group">
                        <label>المعرف الفريد</label>
                        <input type="text" id="uniqueId" readonly class="readonly">
                    </div>
                    <div class="form-group">
                        <label>المنطقة</label>
                        <input type="text" id="area" readonly class="readonly">
                    </div>
                    <div class="form-group">
                        <label>نوع النشاط</label>
                        <input type="text" id="activityType" readonly class="readonly">
                    </div>
                    <div class="form-group">
                        <label>الوحدة</label>
                        <input type="text" id="unit" readonly class="readonly">
                    </div>
                    <div class="form-group">
                        <label>SHFHSP</label>
                        <input type="text" id="shfhsp" readonly class="readonly">
                    </div>
                    <div class="form-group">
                        <label>فئة الخطر</label>
                        <input type="text" id="hazardClass" readonly class="readonly">
                    </div>
                    <div class="form-group">
                        <label>القطاع الفرعي</label>
                        <input type="text" id="subSector" readonly class="readonly">
                    </div>
                    <div class="form-group">
                        <label>تاريخ آخر تفتيش</label>
                        <input type="date" id="lastInspectionDate" readonly class="readonly">
                    </div>
                    <div class="form-group">
                        <label>الإجراءات المتخذة سابقاً</label>
                        <textarea id="previousTakenActions" readonly class="readonly" rows="2"></textarea>
                    </div>
                     <div class="form-group">
                        <label>تاريخ آخر تقييم للمنشأة</label>
                        <input type="date" id="lastEvaluationDate" readonly class="readonly">
                    </div>
                </div>
                <div id="establishmentActionButtons" class="button-group hidden">
                    <button type="button" class="btn-secondary" id="editEstablishmentBtn">
                        <i class="fas fa-edit"></i> تعديل المنشأة
                    </button>
                    <button type="button" class="btn-primary" id="evaluateEstablishmentBtn">
                        <i class="fas fa-star"></i> تقييم المنشأة
                    </button>
                </div>
            </div>
        </div>

        <div class="form-section hidden" id="inspectionSection">
            <h3>2. تفاصيل التفتيش</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>تاريخ التفتيش</label>
                    <input type="date" id="inspectionDate" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group">
                    <label>نوع التفتيش</label>
                    <select id="inspectionType">
                        <option value="">-- اختر نوع التفتيش --</option>
                        <option value="دوري">دوري</option>
                        <option value="شكوى">شكوى</option>
                        <option value="حملة">حملة</option>
                        <option value="ترخيص">ترخيص</option>
                        <option value="عينات">عينات</option>
                        <option value="إتباع">إتباع</option>
                    </select>
                </div>
                <div class="form-group hidden" id="campaignGroup">
                    <label>اسم الحملة</label>
                    <input type="text" id="campaignName">
                </div>
                <div class="form-group">
                    <label>معرف المفتش</label>
                    <?php
                    // Assume you are using PHP sessions and store user_id and username
                    session_start();
                    $loggedInUserId = $_SESSION['user_id'] ?? 1; // Replace with actual login mechanism, default to 1
                    $loggedInUserName = $_SESSION['username'] ?? 'المفتش الافتراضي'; // Replace with actual login mechanism
                    ?>
                    <input type="number" id="inspectorId" value="<?php echo htmlspecialchars($loggedInUserId); ?>" readonly class="readonly">
                </div>
                <div class="form-group">
                    <label>اسم المفتش</label>
                    <input type="text" id="inspectorNameDisplay" value="<?php echo htmlspecialchars($loggedInUserName); ?>" readonly class="readonly">
                </div>
            </div>
            <div class="form-group">
                <label>ملاحظات عامة</label>
                <textarea id="notes"></textarea>
            </div>
            <button id="createInspectionBtn"><i class="fas fa-plus-circle"></i> إنشاء التفتيش</button>
        </div>

        <div class="form-section hidden" id="itemsSection">
            <h3>3. بنود التفتيش</h3>
            <div id="itemsContainer"></div>
            <div class="button-group">
                <button id="saveItemsBtn"><i class="fas fa-save"></i> حفظ البنود</button>
                <button type="button" class="btn-secondary" id="newInspectionBtn">
                    <i class="fas fa-plus"></i> تفتيش جديد
                </button>
                <button type="button" class="btn-danger" id="deleteInspectionBtn">
                    <i class="fas fa-trash"></i> حذف النموذج
                </button>
            </div>
        </div>

        <div class="form-section hidden" id="resultsSection">
            <h3>4. نتائج التفتيش</h3>
            
            <div class="results-grid">
                <div class="result-item">
                    <strong>رقم التفتيش</strong>
                    <span id="resultInspectionId">-</span>
                </div>
                <div class="result-item">
                    <strong>تاريخ التفتيش</strong>
                    <span id="resultDate">-</span>
                </div>
                <div class="result-item">
                    <strong>نوع التفتيش</strong>
                    <span id="resultType">-</span>
                </div>
                <div class="result-item">
                    <strong>النقاط المخصومة</strong>
                    <span id="resultDeducted">0.00</span>
                </div>
                <div class="result-item">
                    <strong>الدرجة النهائية</strong>
                    <span id="resultScore">1000.00</span>
                </div>
                <div class="result-item">
                    <strong>النسبة المئوية</strong>
                    <span id="resultPercentage">100%</span>
                </div>
                <div class="result-item">
                    <strong>التقدير</strong>
                    <span id="resultGrade">-</span>
                </div>
                <div class="result-item">
                    <strong>لون البطاقة</strong>
                    <span id="resultCard">-</span>
                </div>
                <div class="result-item">
                    <strong>المخالفات الحرجة</strong>
                    <span id="resultCritical">0</span>
                </div>
                <div class="result-item">
                    <strong>المخالفات الهامة</strong>
                    <span id="resultMajor">0</span>
                </div>
                <div class="result-item">
                    <strong>المخالفات العامة</strong>
                    <span id="resultGeneral">0</span>
                </div>
                <div class="result-item">
                    <strong>موعد التفتيش القادم</strong>
                    <span id="resultNextDate">-</span>
                </div>
                <div class="result-item">
                    <strong>رقم المخالفة</strong>
                    <input type="text" id="violationRefNo" class="readonly" readonly>
                </div>
                <div class="result-item">
                    <strong>إجمالي قيمة المخالفة</strong>
                    <input type="number" id="totalViolationValue" step="0.01">
                </div>
                <div class="result-item">
                    <strong>حالة الاعتماد</strong>
                    <input type="text" id="approvalStatus" class="readonly" value="Pending" readonly>
                </div>
                <div class="result-item">
                    <strong>تم الاعتماد بواسطة</strong>
                    <input type="text" id="approvedBy" class="readonly" readonly>
                </div>
                <div class="result-item">
                    <strong>تاريخ الاعتماد</strong>
                    <input type="date" id="approvalDate" class="readonly" readonly>
                </div>
                <div class="result-item">
                    <strong>آخر تحديث بواسطة</strong>
                    <input type="text" id="updatedBy" class="readonly" readonly>
                </div>
            </div>
            
            <div class="form-group">
                <label>ملاحظات التفتيش</label>
                <textarea id="resultNotes" readonly class="readonly"></textarea>
            </div>
            <div class="button-group">
                <button type="button" class="btn-primary" id="approveInspectionBtn">
                    <i class="fas fa-check-circle"></i> اعتماد التفتيش
                </button>
                <button type="button" class="btn-secondary" id="editInspectionBtn">
                    <i class="fas fa-edit"></i> تعديل التفتيش
                </button>
                <button type="button" class="btn-secondary" id="newInspectionBtnResults">
                    <i class="fas fa-plus"></i> تفتيش جديد
                </button>
                <button type="button" class="btn-danger" id="deleteInspectionBtnResults">
                    <i class="fas fa-trash"></i> حذف النموذج
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // العناصر الرئيسية
            const messageDiv = document.getElementById('message');
            const searchSection = document.getElementById('searchSection');
            const inspectionSection = document.getElementById('inspectionSection');
            const itemsSection = document.getElementById('itemsSection');
            const resultsSection = document.getElementById('resultsSection');
            
            // عناصر البحث
            const licenseNoInput = document.getElementById('licenseNo');
            const searchBtn = document.getElementById('searchBtn');
            const registerEstablishmentBtn = document.getElementById('registerEstablishmentBtn'); // New button
            const facilitySelectionDiv = document.getElementById('facilitySelection');
            const facilitySelector = document.getElementById('facilitySelector');
            const facilityInfoDiv = document.getElementById('facilityInfo');
            const facilityNameInput = document.getElementById('facilityName');
            const licenseNumberDisplay = document.getElementById('licenseNumberDisplay'); // New: to display license number
            const areaInput = document.getElementById('area');
            const activityTypeInput = document.getElementById('activityType');
            const uniqueIdInput = document.getElementById('uniqueId');
            // New establishment fields
            const unitInput = document.getElementById('unit');
            const shfhspInput = document.getElementById('shfhsp');
            const hazardClassInput = document.getElementById('hazardClass');
            const subSectorInput = document.getElementById('subSector');
            const lastInspectionDateInput = document.getElementById('lastInspectionDate');
            const previousTakenActionsInput = document.getElementById('previousTakenActions');
            const lastEvaluationDateInput = document.getElementById('lastEvaluationDate');

            const establishmentActionButtons = document.getElementById('establishmentActionButtons'); // New div
            const editEstablishmentBtn = document.getElementById('editEstablishmentBtn'); // New button
            const evaluateEstablishmentBtn = document.getElementById('evaluateEstablishmentBtn'); // New button
            
            // عناصر التفتيش
            const inspectionDateInput = document.getElementById('inspectionDate');
            const inspectionTypeSelect = document.getElementById('inspectionType');
            const campaignGroup = document.getElementById('campaignGroup');
            const campaignNameInput = document.getElementById('campaignName');
            const inspectorIdInput = document.getElementById('inspectorId');
            const inspectorNameDisplay = document.getElementById('inspectorNameDisplay'); // New: for inspector name
            const notesTextarea = document.getElementById('notes');
            const createInspectionBtn = document.getElementById('createInspectionBtn');
            
            // عناصر البنود
            const itemsContainer = document.getElementById('itemsContainer');
            const saveItemsBtn = document.getElementById('saveItemsBtn');
            const newInspectionBtn = document.getElementById('newInspectionBtn'); // New button
            const deleteInspectionBtn = document.getElementById('deleteInspectionBtn'); // New button
            
            // عناصر النتائج
            const resultInspectionId = document.getElementById('resultInspectionId');
            const resultDate = document.getElementById('resultDate');
            const resultType = document.getElementById('resultType');
            const resultDeducted = document.getElementById('resultDeducted');
            const resultScore = document.getElementById('resultScore');
            const resultPercentage = document.getElementById('resultPercentage');
            const resultGrade = document.getElementById('resultGrade');
            const resultCard = document.getElementById('resultCard');
            const resultCritical = document.getElementById('resultCritical');
            const resultMajor = document.getElementById('resultMajor');
            const resultGeneral = document.getElementById('resultGeneral');
            const resultNextDate = document.getElementById('resultNextDate');
            const resultNotes = document.getElementById('resultNotes');
            const violationRefNoInput = document.getElementById('violationRefNo'); // New
            const totalViolationValueInput = document.getElementById('totalViolationValue'); // New
            const approvalStatusInput = document.getElementById('approvalStatus'); // New
            const approvedByInput = document.getElementById('approvedBy'); // New
            const approvalDateInput = document.getElementById('approvalDate'); // New
            const updatedByInput = document.getElementById('updatedBy'); // New (from `updated_by_user_id` in API)

            const approveInspectionBtn = document.getElementById('approveInspectionBtn'); // New
            const editInspectionBtn = document.getElementById('editInspectionBtn'); // New
            const newInspectionBtnResults = document.getElementById('newInspectionBtnResults'); // New button
            const deleteInspectionBtnResults = document.getElementById('deleteInspectionBtnResults'); // New button
            
            // متغيرات التطبيق
            let currentInspectionId = null;
            let facilityUniqueId = null;
            let inspectionCodes = [];
            let allFoundFacilities = [];
            
            // عرض الرسائل
            function showMessage(text, isSuccess) {
                messageDiv.textContent = text;
                messageDiv.className = `message ${isSuccess ? 'success' : 'error'}`; // Use class for styling
                messageDiv.style.display = 'block';
                
                setTimeout(() => {
                    messageDiv.style.display = 'none';
                }, 5000);
            }

            // إخفاء جميع الأقسام ما عدا قسم البحث عند التحميل الأول أو إعادة التعيين
            function resetFormVisibility() {
                facilitySelectionDiv.style.display = 'none';
                facilityInfoDiv.style.display = 'none';
                establishmentActionButtons.style.display = 'none'; // Hide establishment action buttons
                registerEstablishmentBtn.style.display = 'none'; // Hide register button
                inspectionSection.style.display = 'none';
                itemsSection.style.display = 'none';
                resultsSection.style.display = 'none';

                // Clear facility info inputs
                facilitySelector.innerHTML = '<option value="">-- اختر منشأة --</option>'; // Reset selector
                facilityNameInput.value = '';
                licenseNumberDisplay.value = ''; // Clear new field
                areaInput.value = '';
                activityTypeInput.value = '';
                uniqueIdInput.value = '';
                unitInput.value = ''; // Clear new field
                shfhspInput.value = ''; // Clear new field
                hazardClassInput.value = ''; // Clear new field
                subSectorInput.value = ''; // Clear new field
                lastInspectionDateInput.value = ''; // Clear new field
                previousTakenActionsInput.value = ''; // Clear new field
                lastEvaluationDateInput.value = ''; // Clear new field
                licenseNoInput.value = ''; // Clear license no input
                facilityUniqueId = null;
                allFoundFacilities = []; // Clear stored facilities
                
                // Clear inspection info inputs
                inspectionDateInput.value = '<?php echo date('Y-m-d'); ?>'; // Reset to current date
                inspectionTypeSelect.value = '';
                campaignGroup.style.display = 'none';
                campaignNameInput.value = '';
                notesTextarea.value = '';
                currentInspectionId = null; // Clear current inspection ID

                // Clear items and results
                itemsContainer.innerHTML = '';
                resultInspectionId.textContent = '-';
                resultDate.textContent = '-';
                resultType.textContent = '-';
                resultDeducted.textContent = '0.00';
                resultScore.textContent = '1000.00';
                resultPercentage.textContent = '100%';
                resultGrade.textContent = '-';
                resultCard.textContent = '-';
                resultCritical.textContent = '0';
                resultMajor.textContent = '0';
                resultGeneral.textContent = '0';
                resultNextDate.textContent = '-';
                resultNotes.value = '';
                violationRefNoInput.value = ''; // Clear new field
                totalViolationValueInput.value = ''; // Clear new field
                approvalStatusInput.value = 'Pending'; // Reset status
                approvedByInput.value = ''; // Clear new field
                approvalDateInput.value = ''; // Clear new field
                updatedByInput.value = ''; // Clear new field

                messageDiv.style.display = 'none'; // Hide any messages

                // Re-enable fields that might have been disabled for editing
                setFormFieldsEditable(true); // Re-enable all fields for a new inspection
            }

            // Call reset on initial load
            resetFormVisibility();
            searchSection.style.display = 'block'; // Ensure search section is always visible

            // البحث عن المنشأة
            searchBtn.addEventListener('click', async function() {
                const licenseNo = licenseNoInput.value.trim();
                if (!licenseNo) {
                    showMessage('الرجاء إدخال رقم الرخصة.', false);
                    resetFormVisibility(); // Reset visibility if input is empty
                    return;
                }
                
                try {
                    const formData = new FormData();
                    formData.append('action', 'search_establishments');
                    formData.append('searchTerm', licenseNo);
                    
                    const response = await fetch('api.php', {
                        method: 'POST',
                        body: formData
                    });
                    
                    const data = await response.json();
                    
                    if (data.success && data.data && data.data.length > 0) {
                        allFoundFacilities = data.data;

                        if (allFoundFacilities.length > 1) {
                            facilitySelector.innerHTML = '<option value="">-- اختر منشأة --</option>';
                            allFoundFacilities.forEach(facility => {
                                const option = document.createElement('option');
                                option.value = facility.unique_id;
                                option.textContent = `${facility.facility_name} (رخصة: ${facility.license_no} - المنطقة: ${facility.area} - المعرف: ${facility.unique_id})`;
                                facilitySelector.appendChild(option);
                            });
                            facilitySelectionDiv.style.display = 'block';
                            facilityInfoDiv.style.display = 'none'; // Hide info until selection
                            inspectionSection.style.display = 'none';
                            itemsSection.style.display = 'none';
                            resultsSection.style.display = 'none';
                            establishmentActionButtons.style.display = 'none'; // Hide action buttons
                            registerEstablishmentBtn.style.display = 'none'; // Hide register button
                            showMessage('تم العثور على عدة منشآت، يرجى الاختيار', true);
                            
                            // Clear current facility data
                            facilityNameInput.value = '';
                            areaInput.value = '';
                            activityTypeInput.value = '';
                            uniqueIdInput.value = '';
                            facilityUniqueId = null;

                        } else {
                            const facility = allFoundFacilities[0];
                            populateFacilityFields(facility);
                            facilitySelectionDiv.style.display = 'none';
                            facilityInfoDiv.style.display = 'block';
                            
                            // Check last_evaluation_date and redirect if null
                            if (!facility.last_evaluation_date || facility.last_evaluation_date === "0000-00-00") { // Check for "0000-00-00" too
                                showMessage('يجب تقييم المنشأة قبل المتابعة. سيتم إعادة توجيهك لنموذج التقييم.', false);
                                setTimeout(() => {
                                    window.location.href = `evaluation_form.php?unique_id=${encodeURIComponent(facility.unique_id)}`;
                                }, 3000); // Redirect after 3 seconds
                                return; // Stop execution here
                            }

                            inspectionSection.style.display = 'block';
                            itemsSection.style.display = 'none'; // Hide these sections until needed
                            resultsSection.style.display = 'none'; // Hide these sections until needed
                            establishmentActionButtons.style.display = 'flex'; // Show establishment action buttons
                            editEstablishmentBtn.dataset.uniqueId = facility.unique_id; // Store unique_id for edit
                            evaluateEstablishmentBtn.dataset.uniqueId = facility.unique_id; // Store unique_id for evaluate
                            registerEstablishmentBtn.style.display = 'none'; // Hide register button
                            showMessage('تم العثور على المنشأة بنجاح', true);
                        }
                        
                    } else {
                        showMessage('رقم الرخصة غير موجود. هل ترغب بتسجيل منشأة جديدة؟', false);
                        resetFormVisibility(); // Reset to clean state
                        registerEstablishmentBtn.style.display = 'block'; // Show register new establishment button
                        searchSection.style.display = 'block'; // Ensure search section remains visible
                    }
                } catch (error) {
                    console.error('Error:', error);
                    showMessage('حدث خطأ أثناء البحث', false);
                    resetFormVisibility(); // Reset visibility on error
                    registerEstablishmentBtn.style.display = 'block'; // Show register new establishment button
                    searchSection.style.display = 'block'; // Ensure search section remains visible
                }
            });

            // Handle facility selection from dropdown
            facilitySelector.addEventListener('change', function() {
                const selectedUniqueId = this.value;
                if (selectedUniqueId) {
                    const selectedFacility = allFoundFacilities.find(f => f.unique_id === selectedUniqueId);
                    if (selectedFacility) {
                        populateFacilityFields(selectedFacility);
                        facilityInfoDiv.style.display = 'block';

                        // Check last_evaluation_date and redirect if null
                        if (!selectedFacility.last_evaluation_date || selectedFacility.last_evaluation_date === "0000-00-00") {
                            showMessage('يجب تقييم المنشأة قبل المتابعة. سيتم إعادة توجيهك لنموذج التقييم.', false);
                            setTimeout(() => {
                                window.location.href = `evaluation_form.php?unique_id=${encodeURIComponent(selectedFacility.unique_id)}`;
                            }, 3000);
                            return;
                        }

                        inspectionSection.style.display = 'block';
                        itemsSection.style.display = 'none';
                        resultsSection.style.display = 'none';
                        establishmentActionButtons.style.display = 'flex'; // Show establishment action buttons
                        editEstablishmentBtn.dataset.uniqueId = selectedFacility.unique_id;
                        evaluateEstablishmentBtn.dataset.uniqueId = selectedFacility.unique_id;
                    }
                } else {
                    // Reset facility info and hide other sections if no facility is selected from dropdown
                    facilityNameInput.value = '';
                    licenseNumberDisplay.value = ''; // Clear new field
                    areaInput.value = '';
                    activityTypeInput.value = '';
                    uniqueIdInput.value = '';
                    unitInput.value = ''; // Clear new field
                    shfhspInput.value = ''; // Clear new field
                    hazardClassInput.value = ''; // Clear new field
                    subSectorInput.value = ''; // Clear new field
                    lastInspectionDateInput.value = ''; // Clear new field
                    previousTakenActionsInput.value = ''; // Clear new field
                    lastEvaluationDateInput.value = ''; // Clear new field
                    facilityUniqueId = null;
                    facilityInfoDiv.style.display = 'none';
                    inspectionSection.style.display = 'none';
                    itemsSection.style.display = 'none';
                    resultsSection.style.display = 'none';
                    establishmentActionButtons.style.display = 'none'; // Hide action buttons
                }
            });

            function populateFacilityFields(facility) {
                facilityNameInput.value = facility.facility_name || '';
                licenseNumberDisplay.value = facility.license_no || ''; // Populate license number
                areaInput.value = facility.area || '';
                activityTypeInput.value = facility.activity_type || '';
                uniqueIdInput.value = facility.unique_id || '';
                facilityUniqueId = facility.unique_id;

                // New fields
                unitInput.value = facility.unit || '';
                shfhspInput.value = facility.shfhsp || '';
                hazardClassInput.value = facility.hazard_class || '';
                subSectorInput.value = facility.sub_sector || '';
                lastInspectionDateInput.value = facility.last_inspection_date || '';
                previousTakenActionsInput.value = facility.taken_actions_previous || '';
                lastEvaluationDateInput.value = facility.last_evaluation_date || '';
            }
            
            // New: Redirect to form_est.php to register a new establishment
            registerEstablishmentBtn.addEventListener('click', () => {
                const licenseNo = licenseNoInput.value.trim();
                window.location.href = `form_est.php?license_no=${encodeURIComponent(licenseNo)}`;
            });

            // New: Redirect to form_est.php to edit the establishment
            editEstablishmentBtn.addEventListener('click', (event) => {
                const uniqueId = uniqueIdInput.value; // Get from populated field
                if (uniqueId) {
                    window.location.href = `form_est.php?unique_id=${encodeURIComponent(uniqueId)}`;
                } else {
                    showMessage('لا يمكن تعديل المنشأة، المعرف الفريد غير موجود.', false);
                }
            });

            // New: Redirect to evaluation_form.php to evaluate the establishment
            evaluateEstablishmentBtn.addEventListener('click', (event) => {
                const uniqueId = uniqueIdInput.value; // Get from populated field
                if (uniqueId) {
                    window.location.href = `evaluation_form.php?unique_id=${encodeURIComponent(uniqueId)}`;
                } else {
                    showMessage('لا يمكن تقييم المنشأة، المعرف الفريد غير موجود.', false);
                }
            });

            // تغيير نوع التفتيش
            inspectionTypeSelect.addEventListener('change', function() {
                if (this.value === 'حملة') {
                    campaignGroup.style.display = 'block';
                } else {
                    campaignGroup.style.display = 'none';
                    campaignNameInput.value = '';
                }
            });
            
            // إنشاء التفتيش
            createInspectionBtn.addEventListener('click', async function() {
                if (!facilityUniqueId) {
                    showMessage('الرجاء البحث عن منشأة أولاً وتحديدها', false);
                    return;
                }
                
                if (!inspectionDateInput.value || !inspectionTypeSelect.value) {
                    showMessage('الرجاء تعبئة جميع الحقول المطلوبة', false);
                    return;
                }
                
                try {
                    const formData = new FormData();
                    formData.append('action', 'create_inspection');
                    formData.append('facility_unique_id', facilityUniqueId);
                    formData.append('inspection_date', inspectionDateInput.value);
                    formData.append('inspection_type', inspectionTypeSelect.value);
                    formData.append('inspector_user_id', inspectorIdInput.value);
                    
                    if (inspectionTypeSelect.value === 'حملة' && campaignNameInput.value) {
                        formData.append('campaign_name', campaignNameInput.value);
                    }
                    
                    if (notesTextarea.value) {
                        formData.append('notes', notesTextarea.value);
                    }
                    
                    const response = await fetch('api.php', {
                        method: 'POST',
                        body: formData
                    });
                    
                    const data = await response.json();
                    
                    if (data.success) {
                        currentInspectionId = data.inspection_id;
                        
                        // تحديث قسم النتائج
                        resultInspectionId.textContent = currentInspectionId;
                        resultDate.textContent = inspectionDateInput.value;
                        resultType.textContent = inspectionTypeSelect.value;
                        resultNotes.value = notesTextarea.value;
                        
                        // إظهار قسم البنود
                        inspectionSection.style.display = 'none';
                        itemsSection.style.display = 'block';
                        resultsSection.style.display = 'none'; // Ensure results are hidden
                        
                        // تحميل بنود التفتيش
                        loadInspectionItems();
                        
                        showMessage('تم إنشاء التفتيش بنجاح', true);
                    } else {
                        showMessage(data.message || 'فشل إنشاء التفتيش', false);
                    }
                } catch (error) {
                    console.error('Error:', error);
                    showMessage('حدث خطأ أثناء إنشاء التفتيش', false);
                }
            });
            
            // تحميل بنود التفتيش
            async function loadInspectionItems() {
                itemsContainer.innerHTML = 'جارٍ تحميل بنود التفتيش...'; // Corrected text
                
                try {
                    const formData = new FormData();
                    formData.append('action', 'get_inspection_codes');
                    formData.append('facility_unique_id', facilityUniqueId);
                    
                    const response = await fetch('api.php', {
                        method: 'POST',
                        body: formData
                    });
                    
                    const data = await response.json();
                    
                    if (data.success && data.data && data.data.length > 0) {
                        inspectionCodes = data.data;
                        renderInspectionItems();
                    } else {
                        itemsContainer.innerHTML = '<p>لا توجد بنود تفتيش متاحة</p>';
                        showMessage('لا توجد بنود تفتيش لهذه المنشأة', false);
                    }
                } catch (error) {
                    console.error('Error:', error);
                    itemsContainer.innerHTML = '<p style="color:red;">حدث خطأ أثناء تحميل البنود</p>';
                    showMessage('حدث خطأ أثناء تحميل بنود التفتيش', false);
                }
            }
            
            // عرض بنود التفتيش
            async function renderInspectionItems() {
                itemsContainer.innerHTML = '';
                
                for (const item of inspectionCodes) {
                    const itemDiv = document.createElement('div');
                    itemDiv.className = 'item-row';

                    // Check for previous violations and repeated count
                    let previousViolationIndicator = '';
                    let isRepeatedViolation = false;
                    let repeatedCount = 0; // Initialize repeatedCount
                    try {
                        const prevViolationsForm = new FormData();
                        prevViolationsForm.append('action', 'check_previous_violation');
                        prevViolationsForm.append('facility_unique_id', facilityUniqueId);
                        prevViolationsForm.append('code_id', item.code_id);
                        
                        const prevViolationsResponse = await fetch('api.php', {
                            method: 'POST',
                            body: prevViolationsForm
                        });
                        const prevViolationsData = await prevViolationsResponse.json();

                        if (prevViolationsData.success) {
                            isRepeatedViolation = prevViolationsData.is_repeated_violation;
                            repeatedCount = prevViolationsData.repeated_count || 0; // Get the actual count
                            if (isRepeatedViolation) {
                                previousViolationIndicator = '<span class="previous-violation-indicator">مخالفة سابقة</span>';
                            }
                        }
                    } catch (error) {
                        console.error('Error checking previous violation:', error);
                    }

                    itemDiv.innerHTML = `
                        <div class="item-header">
                            <p><strong>${item.code_description}</strong> ${previousViolationIndicator}</p>
                            <div class="violation-toggle-group">
                                <label class="switch">
                                    <input type="checkbox" id="isViolation_${item.code_id}" class="is-violation-checkbox" data-code-id="${item.code_id}">
                                    <span class="slider round"></span>
                                </label>
                                <span>هل يوجد مخالفة؟</span>
                            </div>
                        </div>
                        <p><small>الفئة: ${item.code_category || 'غير محدد'} | المرجع: ${item.standard_reference || 'N/A'}</small></p>
                        
                        <div class="violation-details hidden">
                            <div class="form-group">
                                <label>الإجراء المتخذ</label>
                                <select class="action-select" data-code-id="${item.code_id}" data-code-category="${item.code_category}" data-is-repeated-violation="${isRepeatedViolation ? '1' : '0'}" data-initial-repeated-count="${repeatedCount}" disabled>
                                    <option value="">-- اختر الإجراء --</option>
                                    <option value="لا يوجد إجراء">لا يوجد إجراء</option>
                                    <option value="إجراء تصحيحي">إجراء تصحيحي</option>
                                    <option value="انذار">انذار</option>
                                    <option value="مخالفة">مخالفة</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>مستوى الحالة</label>
                                <input type="text" class="condition-level-display" data-code-id="${item.code_id}" 
                                       value="" readonly class="readonly">
                            </div>
                            <div class="form-group">
                                <label>النقاط المخصومة</label>
                                <input type="number" class="points-input" data-code-id="${item.code_id}" 
                                       value="0.00" step="0.01" readonly class="readonly">
                            </div>
                            <div class="form-group">
                                <label>عدد التكرارات السابقة</label>
                                <input type="text" class="repeated-count-display" data-code-id="${item.code_id}" 
                                       value="${repeatedCount}" readonly class="readonly">
                            </div>
                            
                            <div class="form-group correction-group hidden">
                                <label>مدة التصحيح (أيام)</label>
                                <input type="number" class="correction-input" data-code-id="${item.code_id}" 
                                       placeholder="أدخل عدد الأيام" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label>ملاحظات المفتش</label>
                                <textarea class="notes-input" data-code-id="${item.code_id}" 
                                          placeholder="ملاحظات إضافية" disabled></textarea>
                            </div>
                        </div>
                    `;
                    
                    itemsContainer.appendChild(itemDiv);
                    
                    // إعداد تفاعل اختيار "هل يوجد مخالفة؟"
                    const isViolationCheckbox = itemDiv.querySelector('.is-violation-checkbox');
                    const violationDetailsDiv = itemDiv.querySelector('.violation-details');
                    const actionSelect = itemDiv.querySelector('.action-select');
                    const conditionLevelDisplay = itemDiv.querySelector('.condition-level-display');
                    const pointsInput = itemDiv.querySelector('.points-input');
                    const correctionGroup = itemDiv.querySelector('.correction-group');
                    const correctionInput = itemDiv.querySelector('.correction-input');
                    const notesInput = itemDiv.querySelector('.notes-input');
                    const repeatedCountDisplay = itemDiv.querySelector('.repeated-count-display'); // Get reference to new input

                    // Function to enable/disable violation details fields
                    function toggleViolationFields(enable) {
                        actionSelect.disabled = !enable;
                        notesInput.disabled = !enable;
                        if (!enable) {
                            actionSelect.value = ''; // Reset action
                            conditionLevelDisplay.value = '';
                            pointsInput.value = '0.00';
                            pointsInput.dataset.conditionLevel = '';
                            correctionGroup.style.display = 'none';
                            correctionInput.value = '';
                            correctionInput.disabled = true; // Ensure correction input is disabled
                            notesInput.value = ''; // Clear notes
                        }
                    }

                    isViolationCheckbox.addEventListener('change', function() {
                        if (this.checked) { // Yes, there is a violation (checkbox is checked)
                            violationDetailsDiv.style.display = 'block';
                            toggleViolationFields(true);
                        } else { // No violation
                            violationDetailsDiv.style.display = 'none';
                            toggleViolationFields(false);
                        }
                    });

                    // Initial state based on default "No" (unchecked)
                    toggleViolationFields(false);

                    // إعداد تفاعل اختيار الإجراء (يبقى كما هو ولكن يعتمد على isViolation)
                    actionSelect.addEventListener('change', function() {
                        const selectedAction = this.value;
                        const codeCategory = this.dataset.codeCategory;
                        const isRepeated = this.dataset.isRepeatedViolation === '1'; // Get the repeated violation status
                        let conditionLevel = '';
                        
                        if (selectedAction) {
                            let points = 0;
                            
                            // Determine condition level and points based on selected action
                            if (selectedAction === 'إجراء تصحيحي') {
                                conditionLevel = 'Condition I';
                                points = 0; // خصم 0 نقاط للإجراء التصحيحي
                                correctionGroup.style.display = 'none'; // لا توجد مدة تصحيح هنا
                                correctionInput.value = '';
                                correctionInput.disabled = true;
                            } else if (selectedAction === 'انذار') {
                                conditionLevel = 'Condition II';
                                points = calculatePoints(codeCategory, conditionLevel); // استخدم الدالة لحساب نقاط الإنذار
                                correctionGroup.style.display = 'block';
                                correctionInput.disabled = false;
                            } else if (selectedAction === 'مخالفة') {
                                if (isRepeated) { // Use isRepeated flag
                                    conditionLevel = 'Condition V'; // تكرار → حالة خطر داهم
                                } else {
                                    if (codeCategory === 'Critical') {
                                        conditionLevel = 'Condition IV';
                                    } else if (codeCategory === 'Major' || codeCategory === 'General') {
                                        conditionLevel = 'Condition III';
                                    } else {
                                        conditionLevel = 'Condition III'; // افتراضي
                                    }
                                }
                                points = calculatePoints(codeCategory, conditionLevel);
                                correctionGroup.style.display = 'none';
                                correctionInput.value = '';
                                correctionInput.disabled = true;
                            } else { // لا يوجد إجراء
                                conditionLevel = 'N/A';
                                points = 0;
                                correctionGroup.style.display = 'none';
                                correctionInput.value = '';
                                correctionInput.disabled = true;
                            }
                            
                            conditionLevelDisplay.value = conditionLevel;
                            pointsInput.value = points.toFixed(2);
                            pointsInput.dataset.conditionLevel = conditionLevel;
                        } else {
                            conditionLevelDisplay.value = '';
                            pointsInput.value = '0.00';
                            pointsInput.dataset.conditionLevel = '';
                            correctionGroup.style.display = 'none';
                            correctionInput.value = '';
                            correctionInput.disabled = true;
                        }
                    });
                }
            }
            
            // حساب النقاط بناء على نوع البند والإجراء
            function calculatePoints(category, condition) {
                const rules = {
                    'Critical': { 'Condition I': 0, 'Condition II': 175, 'Condition III': 250, 'Condition IV': 300, 'Condition V': 400 }, // Condition I points set to 0
                    'Major': { 'Condition I': 0, 'Condition II': 120, 'Condition III': 150, 'Condition IV': 200, 'Condition V': 250 }, // Condition I points set to 0
                    'General': { 'Condition I': 0, 'Condition II': 50, 'Condition III': 75, 'Condition IV': 100, 'Condition V': 150 }, // Condition I points set to 0
                    'Administrative': { 'Condition I': 0, 'Condition II': 0, 'Condition III': 0, 'Condition IV': 0, 'Condition V': 0 }
                };
                
                return rules[category]?.[condition] || 0;
            }

            
            // حفظ بنود التفتيش / تحديث التفتيش
            saveItemsBtn.addEventListener('click', async function() {
                if (!currentInspectionId) {
                    showMessage('لم يتم إنشاء التفتيش بعد', false);
                    return;
                }
                
                const itemsToSave = [];
                const itemRows = document.querySelectorAll('.item-row');
                
                itemRows.forEach(row => {
                    const codeId = row.querySelector('.is-violation-checkbox').dataset.codeId;
                    const isViolationCheckbox = row.querySelector('.is-violation-checkbox');
                    const isViolation = isViolationCheckbox.checked; // True if checked, False if not

                    let actionTaken = 'لا يوجد إجراء';
                    let conditionLevel = 'N/A';
                    let deductedPoints = 0.00;
                    let immediateCorrection = null;
                    let inspectorNotes = '';

                    if (isViolation) {
                        const actionSelect = row.querySelector('.action-select');
                        actionTaken = actionSelect.value || 'غير محدد'; // If 'Yes' but no action chosen
                        
                        const pointsInput = row.querySelector('.points-input');
                        deductedPoints = parseFloat(pointsInput.value) || 0.00;
                        conditionLevel = pointsInput.dataset.conditionLevel || 'N/A';
                        
                        const correctionInput = row.querySelector('.correction-input');
                        immediateCorrection = (actionTaken === 'انذار' && correctionInput) ? correctionInput.value : null;

                        const notesInput = row.querySelector('.notes-input');
                        inspectorNotes = notesInput.value || '';
                    }
                    
                    // Only save items that are violations AND have an action taken (not "لا يوجد إجراء")
                    // If is_violation is false, or action is "لا يوجد إجراء", do not include in itemsToSave
                    if (isViolation && actionTaken !== 'لا يوجد إجراء') {
                        itemsToSave.push({
                            code_id: codeId,
                            is_violation: 1, // Always 1 if it's pushed here
                            action_taken: actionTaken,
                            condition_level: conditionLevel,
                            deducted_points: deductedPoints,
                            immediate_correction: immediateCorrection,
                            inspector_notes: inspectorNotes
                        });
                    }
                });
                
                // General inspection details that can be updated during edit
                const generalNotes = notesTextarea.value;
                const inspectionType = inspectionTypeSelect.value;
                const campaignName = campaignNameInput.value;
                const inspectorId = inspectorIdInput.value;


                try {
                    const formData = new FormData();
                    formData.append('action', 'save_inspection_items'); // Or 'update_inspection' if editing
                    formData.append('inspection_id', currentInspectionId);
                    formData.append('items_data', JSON.stringify(itemsToSave));
                    formData.append('notes', generalNotes); // Include general notes
                    formData.append('inspection_type', inspectionType); // Include inspection type
                    formData.append('campaign_name', campaignName); // Include campaign name
                    formData.append('inspector_user_id', inspectorId); // Include inspector ID
                    
                    const response = await fetch('api.php', {
                        method: 'POST',
                        body: formData
                    });
                    
                    const data = await response.json();

                    console.log('API Response Data:', data);
                    
                    if (data.success) {
                        // Display violation counts
                        const criticalViolations = data.results.critical_violations || 0;
                        const majorViolations = data.results.major_violations || 0;
                        const generalViolations = data.results.general_violations || 0;

                        // Display the updated results
                        resultDeducted.textContent = parseFloat(data.results.total_deducted_points || 0).toFixed(2);
                        resultScore.textContent = parseFloat(data.results.final_inspection_score || 0).toFixed(2);
                        resultPercentage.textContent = parseFloat(data.results.percentage_score || 0).toFixed(2) + '%';
                        resultGrade.textContent = data.results.letter_grade;
                        resultCard.textContent = data.results.color_card;
                        resultCritical.textContent = criticalViolations;
                        resultMajor.textContent = majorViolations;
                        resultGeneral.textContent = generalViolations;
                        resultNextDate.textContent = data.results.next_inspection_date || 'غير محدد';
                        
                        // New fields for results
                        violationRefNoInput.value = data.results.violation_ref_no || '';
                        totalViolationValueInput.value = parseFloat(data.results.total_violation_value || 0).toFixed(2);
                        approvalStatusInput.value = data.results.approval_status || 'Pending';
                        approvedByInput.value = data.results.approved_by_username || ''; // Assumes API returns username
                        approvalDateInput.value = data.results.approval_date || '';
                        updatedByInput.value = data.results.updated_by_username || '<?php echo htmlspecialchars($loggedInUserName); ?>'; // Or get from API if different

                        // إظهار قسم النتائج
                        itemsSection.style.display = 'none';
                        resultsSection.style.display = 'block';
                        
                        showMessage('تم حفظ البنود وتحديث التفتيش بنجاح', true);

                        // Disable fields after saving/updating unless "Edit" is clicked again
                        setFormFieldsEditable(false);

                    } else {
                        showMessage(data.message || 'فشل حفظ البنود', false);
                    }
                } catch (error) {
                    console.error('Error:', error);
                    showMessage('حدث خطأ أثناء حفظ البنود', false);
                }
            });

            // New: Approve Inspection Button
            approveInspectionBtn.addEventListener('click', async function() {
                if (!currentInspectionId) {
                    showMessage('لا يوجد تفتيش لاعتماده.', false);
                    return;
                }

                if (confirm('هل أنت متأكد أنك تريد اعتماد هذا التفتيش؟')) {
                    try {
                        const formData = new FormData();
                        formData.append('action', 'approve_inspection');
                        formData.append('inspection_id', currentInspectionId);
                        formData.append('approved_by_user_id', '<?php echo htmlspecialchars($loggedInUserId); ?>'); // From PHP session

                        const response = await fetch('api.php', {
                            method: 'POST',
                            body: formData
                        });

                        const data = await response.json();

                        if (data.success) {
                            approvalStatusInput.value = data.approval_status || 'Approved';
                            approvedByInput.value = data.approved_by_username || '<?php echo htmlspecialchars($loggedInUserName); ?>';
                            approvalDateInput.value = data.approval_date || new Date().toISOString().slice(0,10); // Use current date if API doesn't return
                            updatedByInput.value = data.updated_by_username || '<?php echo htmlspecialchars($loggedInUserName); ?>'; // Also update updatedBy
                            showMessage('تم اعتماد التفتيش بنجاح!', true);
                            // Optionally disable approve button after approval
                            approveInspectionBtn.disabled = true;
                            editInspectionBtn.disabled = true; // Disable editing after approval
                        } else {
                            showMessage(data.message || 'فشل اعتماد التفتيش.', false);
                        }
                    } catch (error) {
                        console.error('Error approving inspection:', error);
                        showMessage('حدث خطأ أثناء اعتماد التفتيش.', false);
                    }
                }
            });

            // Function to toggle form field editability
            function setFormFieldsEditable(enable) {
                // Inspection Section fields
                inspectionDateInput.disabled = !enable;
                inspectionTypeSelect.disabled = !enable;
                campaignNameInput.disabled = !enable;
                notesTextarea.disabled = !enable;
                createInspectionBtn.disabled = !enable; // Disable "Create" if editing existing

                // Items Section fields
                const itemRows = document.querySelectorAll('.item-row');
                itemRows.forEach(row => {
                    const isViolationCheckbox = row.querySelector('.is-violation-checkbox');
                    const actionSelect = row.querySelector('.action-select');
                    const correctionInput = row.querySelector('.correction-input');
                    const notesInput = row.querySelector('.notes-input');

                    isViolationCheckbox.disabled = !enable;
                    if (!enable || !isViolationCheckbox.checked) { // If disabling or not a violation
                        actionSelect.disabled = true;
                        correctionInput.disabled = true;
                        notesInput.disabled = true;
                    } else { // If enabling and is a violation
                        actionSelect.disabled = false;
                        if (actionSelect.value === 'انذار') { // Only enable correction if action is 'إنذار'
                            correctionInput.disabled = false;
                        }
                        notesInput.disabled = false;
                    }
                });

                saveItemsBtn.disabled = !enable; // Disable save button if not in edit mode
                // Change button text based on mode
                saveItemsBtn.textContent = enable ? 'تحديث التفتيش' : 'حفظ البنود'; // Simplified, could use a flag
            }

            // New: Edit Inspection Button
            editInspectionBtn.addEventListener('click', function() {
                if (!currentInspectionId) {
                    showMessage('لا يوجد تفتيش لتعديله.', false);
                    return;
                }
                setFormFieldsEditable(true);
                showMessage('أصبح النموذج قابلاً للتعديل الآن.', true);
                // Hide results section and show items/inspection sections if needed
                resultsSection.style.display = 'none';
                inspectionSection.style.display = 'block'; // Show general inspection details
                itemsSection.style.display = 'block'; // Show items
            });

            // New: Event listener for "New Inspection" button (both locations)
            newInspectionBtn.addEventListener('click', resetFormVisibility);
            newInspectionBtnResults.addEventListener('click', resetFormVisibility);

            // New: Event listener for "Delete Form" button (both locations)
            async function handleDeleteInspection() {
                if (!currentInspectionId) {
                    showMessage('لا يوجد نموذج تفتيش لحذفه.', false);
                    return;
                }

                if (confirm('هل أنت متأكد أنك تريد حذف نموذج التفتيش هذا؟ سيؤدي هذا إلى حذف جميع البيانات المتعلقة بهذا التفتيش.')) {
                    try {
                        const formData = new FormData();
                        formData.append('action', 'delete_inspection');
                        formData.append('inspection_id', currentInspectionId);

                        const response = await fetch('api.php', {
                            method: 'POST',
                            body: formData
                        });
                        
                        const data = await response.json();

                        if (data.success) {
                            showMessage('تم حذف النموذج بنجاح.', true);
                            resetFormVisibility();
                        } else {
                            showMessage(data.message || 'فشل حذف النموذج.', false);
                        }
                    } catch (error) {
                        console.error('Error deleting inspection:', error);
                        showMessage('حدث خطأ أثناء حذف النموذج.', false);
                    }
                }
            }
            deleteInspectionBtn.addEventListener('click', handleDeleteInspection);
            deleteInspectionBtnResults.addEventListener('click', handleDeleteInspection);
        });
    </script>
</body>
</html>