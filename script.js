// ------------------------ Signature Canvas JS -----------------------------
const canvas = document.getElementById("signatureCanvas");
const ctx = canvas?.getContext("2d");
let isDrawing = false;

canvas?.addEventListener("mousedown", () => (isDrawing = true));
canvas?.addEventListener("mouseup", () => {
  isDrawing = false;
  ctx?.beginPath();
});
canvas?.addEventListener("mousemove", draw);

function draw(e) {
  if (!isDrawing || !ctx) return;
  ctx.lineWidth = 2;
  ctx.lineCap = "round";
  ctx.strokeStyle = "#000";
  ctx.lineTo(e.offsetX, e.offsetY);
  ctx.stroke();
  ctx.beginPath();
  ctx.moveTo(e.offsetX, e.offsetY);
}

document.getElementById("clearCanvas")?.addEventListener("click", () => {
  if (ctx && canvas) ctx.clearRect(0, 0, canvas.width, canvas.height);
});

document.getElementById("saveSignature")?.addEventListener("click", () => {
  const dataURL = canvas?.toDataURL("image/png");
  if (dataURL) {
    const sigInput = document.getElementById("signatureData");
    if (sigInput) sigInput.value = dataURL;
    closeSignatureModal();
  }
});

function openSignatureModal() {
  const modal = document.getElementById("signatureModal");
  if (modal) modal.style.display = "block";
}

function closeSignatureModal() {
  const modal = document.getElementById("signatureModal");
  if (modal) modal.style.display = "none";
}

document
  .getElementById("closeModal")
  ?.addEventListener("click", closeSignatureModal);

// ---------------------- Add and delete items --------------------------
document.addEventListener("click", function (e) {
  if (e.target.closest(".five-add")) {
    const currentItem = e.target.closest(".lb-five-item");
    if (!currentItem) return;

    const newItem = currentItem.cloneNode(true);
    newItem.querySelector(".five-desc").value = "";
    newItem.querySelector(".five-rate").value = "";
    newItem.querySelector(".five-qnt").value = "";
    newItem.querySelector(".five-amt").textContent = "₹0.00";
    newItem.querySelector(".five-second-desc").value = "";

    document.querySelector(".lb-five")?.appendChild(newItem);
    updateTotals();
  }

  if (e.target.closest(".five-cross")) {
    const item = e.target.closest(".lb-five-item");
    item?.remove();
    updateTotals();
  }
});

//-----------------------Color selection--------------------------------------
function updateColorPreview(color) {
  const preview = document.getElementById("colorPreview");
  if (preview) preview.style.backgroundColor = color;
}

document.querySelectorAll(".color-box").forEach((box) => {
  box.addEventListener("click", () => {
    document
      .querySelectorAll(".color-box")
      .forEach((b) => b.classList.remove("selected"));
    box.classList.add("selected");
  });
});

// --------------------- Color Picker --------------------
const colorBoxes = document.querySelectorAll(".color-box");
const noColorBox = document.querySelector(".no-color");
const colorPicker = document.getElementById("colorPicker");
const selectedColorInput = document.getElementById("selected_color");

colorBoxes.forEach((box) => {
  box.addEventListener("click", () => {
    const color = box.style.backgroundColor;
    if (selectedColorInput) selectedColorInput.value = color;
  });
});

noColorBox?.addEventListener("click", () => {
  if (selectedColorInput) selectedColorInput.value = "";
});

colorPicker?.addEventListener("change", (e) => {
  const color = e.target.value;
  const preview = document.getElementById("colorPreview");
  if (preview) preview.style.backgroundColor = color;
  if (selectedColorInput) selectedColorInput.value = color;
});

// -------------------------- Discount toggle ------------------------------
function toggleDiscountFields() {
  const type = document.getElementById("discountType")?.value;
  const fieldContainer = document.getElementById("discountFields");
  const label = document.getElementById("discountLabel");
  const suffix = document.getElementById("discountSuffix");

  if (!type || !fieldContainer || !label || !suffix) return;

  if (type === "none") {
    fieldContainer.style.display = "none";
  } else {
    fieldContainer.style.display = "block";
    label.textContent = type === "percent" ? "Percent" : "Amount";
    suffix.textContent = type === "percent" ? "%" : "₹";
  }
}

// -------------------------- Currency Dropdown -------------------------------
let selectedCurrency = {
  code: "INR",
  symbol: "₹",
  rate: 1,
};

const exchangeRates = {
  INR: 1,
  USD: 83,
  EUR: 89,
  GBP: 103,
  CAD: 62,
  AUD: 55,
};

function toggleDropdown() {
  document.getElementById("currencyDropdown")?.classList.toggle("show");
}

function selectCurrency(code, symbol, countryCode) {
  selectedCurrency = {
    code,
    symbol,
    rate: exchangeRates[code] || 1,
  };

  const left = document.querySelector(".selected-left");
  const right = document.querySelector(".selected-right");

  if (left) left.textContent = code;

  if (right) {
    right.innerHTML = `
      <span>${symbol}</span>
      <span class="fi fi-${countryCode}"></span>
    `;
  }

  document.getElementById("currency_code").value = code;
  document.getElementById("currency_symbol").value = symbol;

  document.getElementById("currencyDropdown")?.classList.remove("show");
  updateAllAmounts();
}

function formatCurrency(value) {
  const converted = value / selectedCurrency.rate;
  return `${selectedCurrency.symbol}${converted.toFixed(2)}`;
}

function updateAllAmounts() {
  let total = 0;

  document.querySelectorAll(".lb-five-item").forEach((item) => {
    const rate = parseFloat(item.querySelector(".five-rate")?.value || 0);
    const qty = parseInt(item.querySelector(".five-qnt")?.value || 0);
    const amount = rate * qty;
    total += amount;

    const amtField = item.querySelector(".five-amt");
    if (amtField) amtField.textContent = formatCurrency(amount);
  });

  const subtotal = total;
  const discountPercent = parseFloat(
    document.getElementById("discountPercent")?.value || 0
  );
  const discountAmt = subtotal * (discountPercent / 100);
  const taxPercent = parseFloat(
    document.getElementById("taxPercent")?.value || 0
  );
  const taxAmt = (subtotal - discountAmt) * (taxPercent / 100);
  const finalTotal = subtotal - discountAmt + taxAmt;

  const subtotalEl = document.getElementById("subtotal");
  if (subtotalEl) subtotalEl.textContent = formatCurrency(subtotal);

  const discountEl = document.getElementById("discount");
  if (discountEl) discountEl.textContent = formatCurrency(discountAmt);

  const taxEl = document.getElementById("tax");
  if (taxEl) taxEl.textContent = formatCurrency(taxAmt);

  const totalEl = document.getElementById("total");
  if (totalEl) totalEl.textContent = formatCurrency(finalTotal);

  const balanceEl = document.getElementById("balance");
  if (balanceEl) balanceEl.textContent = formatCurrency(finalTotal);
}

window.addEventListener("click", function (e) {
  const dropdown = document.getElementById("currencyDropdown");
  const trigger = document.querySelector(".selected-currency");
  if (
    dropdown &&
    trigger &&
    !trigger.contains(e.target) &&
    !dropdown.contains(e.target)
  ) {
    dropdown.classList.remove("show");
  }
});
// reflecting emails
const fromEmailInput = document.querySelector('input[name="from_email"]');
const previewEmailInput = document.getElementById("email");

fromEmailInput.addEventListener("input", () => {
  previewEmailInput.value = fromEmailInput.value;
});

// --------------------- Calculate amount and total ---------------------------
// function calculateAmount(item) {
//   const rate = parseFloat(item.querySelector(".five-rate")?.value || 0);
//   const qty = parseInt(item.querySelector(".five-qnt")?.value || 0);
//   const amount = rate * qty;
//   const amtField = item.querySelector(".five-amt");
//   if (amtField) amtField.textContent = `₹${amount.toFixed(2)}`;
// }

// function updateTotals() {
//   let subtotal = 0;
//   const items = document.querySelectorAll(".lb-five-item");

//   items.forEach((item) => {
//     const rate = parseFloat(item.querySelector(".five-rate")?.value || 0);
//     const qty = parseInt(item.querySelector(".five-qnt")?.value || 0);
//     subtotal += rate * qty;
//   });

//   const discountType = document.getElementById("discountType")?.value || "none";
//   const discountValue = parseFloat(
//     document.getElementById("discountValue")?.value || 0
//   );
//   let discountAmount = 0;

//   if (discountType === "percent") {
//     discountAmount = (subtotal * discountValue) / 100;
//   } else if (discountType === "flat") {
//     discountAmount = discountValue;
//   }

//   const discountedSubtotal = subtotal - discountAmount;

//   const taxType = document.getElementById("taxType")?.value || "none";
//   const taxRate = parseFloat(document.getElementById("taxRate")?.value || 0);
//   const inclusive = document.getElementById("inclusive")?.checked;
//   let taxAmount = 0;

//   if (taxType === "on_total") {
//     taxAmount = (discountedSubtotal * taxRate) / 100;
//   } else if (taxType === "per_item") {
//     items.forEach((item) => {
//       const rate = parseFloat(item.querySelector(".five-rate")?.value || 0);
//       const qty = parseInt(item.querySelector(".five-qnt")?.value || 0);
//       taxAmount += (rate * qty * taxRate) / 100;
//     });
//   } else if (taxType === "deducted") {
//     taxAmount = (-1 * (discountedSubtotal * taxRate)) / 100;
//   }

//   const total = inclusive ? discountedSubtotal : discountedSubtotal + taxAmount;

//   const formatted = (val) =>
//     `₹${val.toLocaleString("en-IN", { minimumFractionDigits: 2 })}`;

//   const subtotalEl = document.getElementById("subtotal");
//   if (subtotalEl) subtotalEl.textContent = formatted(subtotal);

//   const totalEl = document.getElementById("total");
//   if (totalEl) totalEl.textContent = formatted(total);

//   const balanceEl = document.getElementById("balance");
//   if (balanceEl) balanceEl.textContent = formatted(total);

//   const container = document.querySelector(".total-box");
//   document.getElementById("discount-details")?.remove();
//   document.getElementById("tax-details")?.remove();

//   if (discountAmount > 0) {
//     const discountEl = document.createElement("div");
//     discountEl.id = "discount-details";
//     const label =
//       discountType === "percent" ? `${discountValue}%` : `₹${discountValue}`;
//     discountEl.innerHTML = `Discount (${label}): <span>-${formatted(
//       discountAmount
//     )}</span>`;
//     container?.insertBefore(
//       discountEl,
//       container.querySelector("#total")?.parentElement
//     );
//   }

//   if (taxRate > 0 && taxType !== "none") {
//     const taxEl = document.createElement("div");
//     taxEl.id = "tax-details";
//     taxEl.innerHTML = `Tax (${taxRate}%): <span>${formatted(taxAmount)}</span>`;
//     container?.insertBefore(
//       taxEl,
//       container.querySelector("#total")?.parentElement
//     );
//   }
// }

// function handleTaxTypeChange() {
//   const taxType = document.getElementById("taxType")?.value;
//   const taxFields = document.getElementById("taxFields");
//   if (taxFields) {
//     taxFields.style.display = taxType !== "none" ? "block" : "none";
//   }
//   updateTotals();
// }

// document.addEventListener("input", function (e) {
//   if (
//     e.target.classList.contains("five-rate") ||
//     e.target.classList.contains("five-qnt") ||
//     e.target.id === "taxRate" ||
//     e.target.id === "discountValue" ||
//     e.target.id === "discountType" ||
//     e.target.id === "inclusive"
//   ) {
//     const item = e.target.closest(".lb-five-item");
//     if (item) {
//       calculateAmount(item);
//     }
//     updateTotals();
//     document.getElementById("subtotalInput").value = subtotal.toFixed(2);
//     document.getElementById("totalInput").value = total.toFixed(2);
//     document.getElementById("balanceInput").value = total.toFixed(2);
//   }
// });

// document
//   .getElementById("taxType")
//   ?.addEventListener("change", handleTaxTypeChange);

// window.addEventListener("DOMContentLoaded", () => {
//   document.querySelectorAll(".lb-five-item").forEach(calculateAmount);
//   updateTotals();
// });

document.addEventListener("DOMContentLoaded", () => {
  const container = document.querySelector(".lb-five");

  function updateAmount(row) {
    const rate = parseFloat(row.querySelector(".five-rate").value) || 0;
    const qty = parseInt(row.querySelector(".five-qnt").value) || 0;
    const amount = rate * qty;
    row.querySelector(".five-amt").textContent = `₹${amount.toFixed(2)}`;
  }

  function getSubtotal() {
    let subtotal = 0;
    document.querySelectorAll(".lb-five-item").forEach((row) => {
      const rate = parseFloat(row.querySelector(".five-rate").value) || 0;
      const qty = parseInt(row.querySelector(".five-qnt").value) || 0;
      subtotal += rate * qty;
    });
    return subtotal;
  }

  function getDiscount(subtotal) {
    const discountType = document.getElementById("discountType").value;
    const discountValue =
      parseFloat(document.getElementById("discountValue").value) || 0;

    if (discountType === "percent") {
      return (subtotal * discountValue) / 100;
    } else if (discountType === "flat") {
      return discountValue;
    }
    return 0;
  }

  function getTax(subtotal, perItemTotal = 0) {
    const taxType = document.getElementById("taxType").value;
    const taxRate = parseFloat(document.getElementById("taxRate").value) || 0;
    const inclusive = document.getElementById("inclusive").checked;

    if (taxType === "none") return 0;

    if (taxType === "on_total") {
      return inclusive
        ? subtotal - subtotal / (1 + taxRate / 100)
        : (subtotal * taxRate) / 100;
    } else if (taxType === "deducted") {
      return -(subtotal * taxRate) / 100;
    } else if (taxType === "per_item") {
      return (perItemTotal * taxRate) / 100;
    }

    return 0;
  }

  function updateTotals() {
    let subtotal = getSubtotal();
    let perItemTotal = subtotal;

    const discount = getDiscount(subtotal);
    subtotal -= discount;

    const tax = getTax(subtotal, perItemTotal);
    const total = subtotal + tax;

    const formatted = (val) => `₹${val.toFixed(2)}`;

    document.getElementById("subtotal").textContent = formatted(perItemTotal);
    document.getElementById("discount").textContent = formatted(discount);
    document.getElementById("tax").textContent = formatted(tax);
    document.getElementById("total").textContent = formatted(total);
    document.getElementById("balance").textContent = formatted(total);
  }

  container.addEventListener("input", (e) => {
    if (
      e.target.classList.contains("five-rate") ||
      e.target.classList.contains("five-qnt")
    ) {
      const row = e.target.closest(".lb-five-item");
      updateAmount(row);
      updateTotals();
    }
  });

  // Trigger updates on tax & discount fields
  ["taxType", "taxRate", "inclusive", "discountType", "discountValue"].forEach(
    (id) => {
      document.getElementById(id).addEventListener("input", updateTotals);
      document.getElementById(id).addEventListener("change", updateTotals);
    }
  );

  // Run on load
  document
    .querySelectorAll(".lb-five-item")
    .forEach((row) => updateAmount(row));
  updateTotals();
});

// Show/hide dynamic input fields
function handleTaxTypeChange() {
  const taxType = document.getElementById("taxType").value;
  const taxFields = document.getElementById("taxFields");
  taxFields.style.display = taxType === "none" ? "none" : "block";
}

function toggleDiscountFields() {
  const discountType = document.getElementById("discountType").value;
  const discountFields = document.getElementById("discountFields");
  const discountLabel = document.getElementById("discountLabel");
  const discountSuffix = document.getElementById("discountSuffix");

  if (discountType === "none") {
    discountFields.style.display = "none";
  } else {
    discountFields.style.display = "block";
    discountLabel.textContent = discountType === "flat" ? "Amount" : "Percent";
    discountSuffix.textContent = discountType === "flat" ? "₹" : "%";
  }
}
