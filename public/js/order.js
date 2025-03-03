document.addEventListener("DOMContentLoaded", function () {
    let countInput = document.getElementById("count_order");
    let amountInput = document.getElementById("amount_price");
    let foodPrice = parseFloat(document.getElementById("food_price").value);

    countInput.addEventListener("input", function () {
        let count = parseInt(countInput.value) || 1;
        let total = foodPrice * count;
        amountInput.value = total.toFixed(2);
    });
});
