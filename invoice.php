<?php
// Always define your variables before using them
$signaturePath = "";
$photoPath = "";

// --- Signature Handling ---
if (isset($_POST['signature_data']) && !empty($_POST['signature_data'])) {
    $data = $_POST['signature_data'];
    list(, $data) = explode(';', $data);
    list(, $data) = explode(',', $data);
    $data = base64_decode($data);
    $signaturePath = 'uploads/signature_' . uniqid() . '.png';
    file_put_contents($signaturePath, $data);
}

// --- Photo Upload Handling ---
if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_OK) {
    $tmpName = $_FILES["photo"]["tmp_name"];
    $fileName = basename($_FILES["photo"]["name"]);
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $photoPath = $uploadDir . uniqid("photo_") . "_" . $fileName;
    move_uploaded_file($tmpName, $photoPath);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice Form</title>
    <link rel="stylesheet" href="invoice.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.6/css/flag-icons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


</head>

<body>
    <header>
        <div class="container">
            <div class="header-container">
                <a href="index.html" class="logo">
                    <svg width="24" height="24" viewBox="0 0 21 19" fill="white" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.5257 0.366943L9.18097 10.1489L8.86262 10.3805L8.70634 10.4673L8.60794 10.502L8.49218 10.5425L8.43430 10.5599L8.36484 10.5715L8.27802 10.5772H8.11595H7.91915L7.82075 10.5715L7.73393 10.5599L7.65290 10.5425L7.58923 10.5252L0.730264 7.89154L0.579773 7.85681L0.504526 7.87997L0.429281 7.95521L0.406128 8.00731V8.07676L0.429281 8.18674L0.730264 8.57455L7.78602 18.3392L7.86127 18.4028L7.95388 18.4781L8.09858 18.5186L8.23750 18.5244L8.38220 18.4897L8.50954 18.4144L8.60794 18.3218L8.74107 18.1771L20.6589 0.505859V0.436401L20.6241 0.366943H20.5257Z" />
                    </svg>
                    <span class="logo-text">Invoice Simple</span>
                </a>

                <nav class="navbar">
                    <a href="./index.php">Home</a>
                    <a href="./about.php">About</a>
                    <a href="./working.php">How It Works</a>
                    <a href="./service.php">services</a>
                    <a href="./contact.php">Contact</a>
                </nav>

                <div class="auth-buttons">
                    <a href="#" class="login-btn">Login</a>
                    <a href="#" class="signup-btn">Sign Up</a>
                </div>
            </div>
        </div>
    </header>
    <form action="preview.php" method="POST" enctype="multipart/form-data">
        <div class="main-container">
            <div class="main-body">
                <div class="left">
                    <div class="left-head">
                        <span class="main-head-one">
                            <button id="left-btn" class="active">Preview</button>
                            <button id="left-btn" disabled>Edit</button>
                        </span>
                        <span class="main-head-two">
                            <button id="left-btn" disabled>Payment scheduling</button>
                            <button id="left-btn" disabled>PDF</button>
                            <button id="left-btn" class="primary">Email Invoice</button>
                        </span>
                    </div>
                    <div class="left-body">
                        <div class="lb-container">
                            <!-- First Section -->
                            <div class="lb-one">
                                <div class="one-invoice">
                                    <input type="text" name="invoice_title" class="lb-input" value="Invoice" />
                                </div>
                                <div class="one-logo">
                                    <label for="logo-upload" class="logo-label">
                                        <img src="https://img.icons8.com/ios-filled/50/image.png" alt="Upload Icon" class="logo-icon" />
                                        <span>+ Logo</span>
                                    </label>
                                    <input type="file" name="logo" id="logo-upload" class="logo-input" accept="image/*" />
                                </div>
                            </div>

                            <!-- Second Section -->
                            <div class="lb-two">
                                <div class="section">
                                    <h3>From</h3>

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="from_name" placeholder="Business Name" />
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="from_email" placeholder="name@business.com" />
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="from_address" placeholder="Street" />
                                    </div>

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" name="from_phone" placeholder="(123) 456 789" />
                                    </div>

                                    <div class="form-group">
                                        <label>Business <br>Number</label>
                                        <input type="text" name="from_business_number" placeholder="123-45-6789" />
                                    </div>
                                    <div class="form-group">
                                        <label></label>
                                        <a href="" style="color: #4288d0;">
                                            Show additional business details</a>
                                    </div>
                                </div>

                                <div class="section">
                                    <h3>Bill To</h3>

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="bill_name" placeholder="Client Name" />
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="bill_email" placeholder="name@client.com" />
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="bill_address" placeholder="Street" />
                                    </div>

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" name="bill_phone" placeholder="(123) 456 789" />
                                    </div>

                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="tel" name="bill_mobile" placeholder="(123) 456 789" />
                                    </div>

                                    <div class="form-group">
                                        <label>Fax</label>
                                        <input type="tel" name="bill_fax" placeholder="(123) 456 789" />
                                    </div>
                                </div>
                            </div>
                            <hr class="styled-line">

                            <!-- Third Section -->
                            <div class="lb-three">
                                <div class="three-container">
                                    <div class="section">
                                        <div class="three-form-group">
                                            <label>Number</label>
                                            <input type="text" name="invoice_number" placeholder="INV0001" />

                                        </div>


                                        <div class="three-form-group">
                                            <label>Date</label>
                                            <input type="date" name="invoice_date" />
                                        </div>

                                        <div class="three-form-group">
                                            <label for="invoice_terms">Terms</label>
                                            <select name="invoice_terms" id="invoice_terms">
                                                <option value="" disabled selected>On Receipt</option>
                                                <option value="None">None</option>
                                                <option value="Custom">Custom</option>
                                                <option value="On Receipt">On Receipt</option>
                                                <option value="Next Day">Next Day</option>
                                                <option value="2 Days">2 Days</option>
                                                <option value="3 Days">3 Days</option>
                                                <option value="4 Days">4 Days</option>
                                                <option value="5 Days">5 Days</option>
                                                <option value="7 Days">7 Days</option>
                                                <option value="10 Days">10 Days</option>
                                                <option value="15 Days">15 Days</option>
                                                <option value="30 Days">30 Days</option>
                                                <option value="45 Days">45 Days</option>
                                                <option value="60 Days">60 Days</option>
                                                <option value="90 Days">90 Days</option>
                                                <option value="120 Days">120 Days</option>
                                                <option value="180 Days">180 Days</option>
                                                <option value="365 Days">365 Days</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr class="styled-line-dark">
                            <!-- section four -->
                            <div class="lb-four">
                                <div class="label description">DESCRIPTION</div>
                                <div class="label-group">
                                    <div class="label">RATE</div>
                                    <div class="label">QTY</div>
                                    <div class="label">AMOUNT</div>
                                </div>
                            </div>

                            <hr class="styled-line-dark">
                            <!-- section five -->
                            <div class="lb-five">
                                <div class="lb-five-item">
                                    <div class="lb-five-first">
                                        <button type="button" class="five-cross"><strong>X</strong></button>
                                        <input type="text" name="item_description[]" placeholder="Item Description" class="five-desc">
                                        <input type="number" name=" item_rate[]" placeholder="0.00" class="five-rate">
                                        <input type="number" step="1" name="item_qty[]" placeholder="1" class="five-qnt" value="1">


                                        <div class="five-amt">₹0.00</div>
                                    </div>
                                    <div class="lb-five-second">
                                        <input type="text" name="item_details[]" placeholder="Additional Details" class="five-second-desc">

                                    </div>
                                    <div class="lb-five-third">
                                        <hr class="styled-line" style="margin-bottom: 7px;">
                                        <button type="button" class="five-add"><strong>+</strong></button>
                                        <hr class="styled-line" style="margin-top: 7px;">
                                    </div>
                                </div>
                            </div>


                            <!-- section six -->
                            <div class="lb-six">
                                <div class="total-box">
                                    <div>Subtotal: <span id="subtotal">₹0.00</span></div>
                                    <div>Discount: <span id="discount">₹0.00</span></div>
                                    <div>Tax: <span id="tax">₹0.00</span></div>
                                    <div>Total: <span id="total">₹0.00</span></div>
                                    <div><strong>Balance Due: <span id="balance">₹0.00</span></strong></div>
                                </div>

                            </div>


                            <!-- section seven -->
                            <div class="lb-seven">
                                <h3>Notes</h3>
                                <textarea name="notes" placeholder="Notes - any relevant information not covered, additional terms and conditions"></textarea>
                            </div>
                            <!-- section eight -->
                            <div class="lb-eight">
                                <h3>Signature</h3>
                                <button type="button" class="eight-add" onclick="openSignatureModal()"><strong>+</strong></button>
                            </div>

                            <!-- Signature Modal -->
                            <div id="signatureModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <span class="close" onclick="closeSignatureModal()">&times;</span>
                                    <h2>Sign Here</h2>
                                    <canvas id="signatureCanvas" width="400" height="200" style="border: 1px solid #ccc;"></canvas>
                                    <br>
                                    <button type="button" id="clearCanvas">Clear</button>
                                    <button type="button" id="saveSignature">Save</button>
                                    <button type="button" id="closeModal">Close</button>
                                </div>
                            </div>

                            <!-- Hidden field to hold signature image -->
                            <input type="hidden" name="signature_data" id="signatureData">
                            <!-- Add these inside the form in invoice.php -->
                            <input type="hidden" name="currency_code" id="currency_code" value="INR">
                            <input type="hidden" name="currency_symbol" id="currency_symbol" value="₹">

                            <!-- Photos Section -->
                            <div class="lb-nine">
                                <h3>Photos</h3>
                                <label for="photoUpload" class="photo-upload-box">
                                    <span class="photo-icon">
                                        <!-- Black Image Icon SVG -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4d5562" viewBox="0 0 24 24">
                                            <path d="M21 19V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2zM5 5h14v3l-2.5 2.5-3.5-3.5L5 17V5z" />
                                        </svg>
                                    </span>
                                    <span>Add Photo</span>
                                </label>
                                <input type="file" name="photo" id="photoUpload" accept="image/*" class="nine-photo" style="display: none;" />
                            </div>
                            <!-- Hidden input to store the uploaded photo path -->
                            <input type="hidden" name="photo" id="photoInput">


                            <img id="photoPreview" style="margin-top: 10px; max-width: 200px; display: none;" />


                        </div>
                    </div>
                </div>

                <div class="right">
                    <!-- right - one -->
                    <div class="right-box ">
                        <h3>PREVIEW VIA EMAIL</h3>
                        <hr class="right-divider">
                        <input type="email" id="email" name="email" placeholder="name@business.com" required class="right-input">
                        <button type="button" class="right-send" disabled>Send</button>
                    </div>
                    <!-- right two -->
                    <div class="right-box right-two">
                        <h3>REVIEWS</h3>
                        <hr class="right-divider">

                        <div class="toggle-container">
                            <label class="right-tick">Request reviews</label>
                            <label class="switch">
                                <input type="checkbox" id="requestReviewsToggle">
                                <span class="slider"></span>
                            </label>
                        </div>
                        <input type="text" class="right-input" placeholder="Review website link">
                        <div class="right-text">
                            <p>Grow your business by collecting <br>rating and reviews.</p>
                        </div>
                    </div>
                    <div class="right-box right-three">
                        <h3>TEMPLATE</h3>
                        <hr class="right-divider">
                        <div class="color-palette">
                            <div class="color-box no-color"><span>🚫</span></div>
                            <div class="color-box" style="background-color: #333333;"></div>
                            <div class="color-box" style="background-color: #555555;"></div>
                            <div class="color-box" style="background-color: #495963;"></div>
                            <div class="color-box" style="background-color: #b63831;"></div>
                            <div class="color-box" style="background-color: #c63360;"></div>
                            <div class="color-box" style="background-color: #71269c;"></div>

                            <div class="color-box" style="background-color: #41289a;"></div>
                            <div class="color-box" style="background-color: #2b358e;"></div>
                            <div class="color-box" style="background-color: #3063ba;"></div>
                            <div class="color-box" style="background-color: #3375b7;"></div>
                            <div class="color-box" style="background-color: #2c675c;"></div>
                            <div class="color-box" style="background-color: #457b3b;"></div>

                            <div class="color-box" style="background-color: #a3bb8e;"></div>
                        </div>
                        <div class="dropdown-container" onclick="document.getElementById('colorPicker').click();">
                            <div class="color-wheel" id="colorPreview"></div>
                            <div class="dropdown-label">Custom Color</div>
                            <input type="color" id="colorPicker" style="display: none;" onchange="updateColorPreview(this.value)">
                            <input type="hidden" name="selected_color" id="selected_color">
                        </div>

                        <button type="button" class="right-customize">Customize</button>
                    </div>
                    <div class="right-box">
                        <h3>TAX</h3>
                        <hr class="right-divider">

                        <div class="tax-type-dropdown">
                            <label for="taxType">Type</label>
                            <select id="taxType" name="taxType" onchange="handleTaxTypeChange()">
                                <option value="none">None</option>
                                <option value="on_total">On Total</option>
                                <option value="deducted">Deducted</option>
                                <option value="per_item">Per Items</option>
                            </select>
                        </div>

                        <div id="taxFields" style="display: none; margin-top: 10px;">
                            <label for="taxLabel">Label</label>
                            <input type="text" id="taxLabel" name="taxLabel" placeholder="e.g., Tax">

                            <label for="taxRate">Rate</label>
                            <input type="number" id="taxRate" name="taxRate" min="0" max="100" step="0.001"> %

                            <div>
                                <input type="checkbox" id="inclusive" name="inclusive">
                                <label for="inclusive">Inclusive?</label>
                            </div>
                        </div>

                    </div>

                    <div class="right-box">
                        <h3>DISCOUNT</h3>
                        <hr class="right-divider">

                        <div class="tax-type-dropdown">
                            <label for="discountType">Type</label>
                            <select id="discountType" name="discountType" onchange="toggleDiscountFields()">
                                <option value="none">None</option>
                                <option value="percent">Percent</option>
                                <option value="flat">Flat Amount</option>
                            </select>
                        </div>

                        <!-- Dynamic Discount Fields -->
                        <div id="discountFields" style="display: none; margin-top: 10px;">
                            <label id="discountLabel" for="discountValue">Percent</label>
                            <div style="display: flex; align-items: center;">
                                <input type="number" id="discountValue" name="discountValue" min="0" step="0.001" style="margin-right: 4px;">
                                <span id="discountSuffix">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="right-box">
                        <h3>CURRENCY</h3>
                        <hr class="right-divider">

                        <!-- Selected currency box -->
                        <div class="selected-currency" onclick="toggleDropdown()">
                            <span class="selected-left">INR</span>
                            <div class="selected-right">
                                <span>₹</span>
                                <span class="fi fi-in"></span>
                            </div>
                        </div>

                        <!-- Dropdown list -->
                        <div class="dropdown" id="currencyDropdown">
                            <div class="dropdown-item" onclick="selectCurrency('USD', '$', 'us')">
                                <div class="left-part"><span class="currency-symbol">USD</span><span class="fi fi-us"></span></div>
                                <span>$</span>
                            </div>
                            <div class="dropdown-item" onclick="selectCurrency('EUR', '€', 'eu')">
                                <div class="left-part"><span class="currency-symbol">EUR</span><span class="fi fi-eu"></span></div>
                                <span>€</span>
                            </div>
                            <div class="dropdown-item" onclick="selectCurrency('GBP', '£', 'gb')">
                                <div class="left-part"><span class="currency-symbol">GBP</span><span class="fi fi-gb"></span></div>
                                <span>£</span>
                            </div>
                            <div class="dropdown-item" onclick="selectCurrency('CAD', '$', 'ca')">
                                <div class="left-part"><span class="currency-symbol">CAD</span><span class="fi fi-ca"></span></div>
                                <span>$</span>
                            </div>
                            <div class="dropdown-item" onclick="selectCurrency('INR', '₹', 'in')">
                                <div class="left-part"><span class="currency-symbol">INR</span><span class="fi fi-in"></span></div>
                                <span>₹</span>
                            </div>
                            <div class="dropdown-item" onclick="selectCurrency('AUD', '$', 'au')">
                                <div class="left-part"><span class="currency-symbol">AUD</span><span class="fi fi-au"></span></div>
                                <span>$</span>
                            </div>
                        </div>
                    </div>
                    <div class="right-box">
                        <h3>OPTIONS</h3>
                        <hr class="right-divider">
                        <button type="button" class="right-customize right-link">Get Link</button>
                        <button type="submit" class="right-customize">Print Invoice</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="script.js"></script>
</body>

<footer>
    <div class="container">
        <div class="footer-container">
            <div class="footer-section about">
                <h3>About Us</h3>
                <p>Invoice Simple helps freelancers and small businesses create professional invoices easily.
                    Trusted by thousands worldwide.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="footer-section links">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./about.php">about</a></li>
                    <li><a href="./working.php">How It Works</a></li>
                    <li><a href="./service.php">Services</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                </ul>
            </div>

            <div class="footer-section support">
                <h3>Support</h3>
                <ul class="footer-links">
                    <li><a href="./support//help-center.php">Help Center</a></li>
                    <li><a href="./support//faqs.php">FAQs</a></li>
                    <li><a href="./support//terms-of-services.php">Terms of Service</a></li>
                    <li><a href="./support//privacy-policy.php">Privacy Policy</a></li>
                </ul>
            </div>

            <div class="footer-section contact">
                <h3>Contact Us</h3>
                <div class="contact-info">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Amravati, Maharashtra, India</span>
                </div>
                <div class="contact-info">
                    <i class="fas fa-phone"></i>
                    <span>+91 98765 43210</span>
                </div>
                <div class="contact-info">
                    <i class="fas fa-envelope"></i>
                    <span>support@invoicesimple.com</span>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2025 Invoice Simple. All rights reserved.</p>
        </div>
    </div>
</footer>


</html>