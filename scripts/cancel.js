let selects = document.querySelectorAll('select');
selects.forEach((select) => {
    select.addEventListener('change', function (evt) {
        let div = document.createElement('div');
        div.setAttribute('class', 'mt-2 cancel');
        div.setAttribute('style', 'width: 170px');
        div.innerHTML = `
            <label for="reason" class="form-label mb-1">
            Причина отмены
            </label>
            <input class="form-control" type="text" name="reason" id="reason" required>
            `;

        if (this.value === 'отменена') {
            this.after(div)
        }
        else if (this.nextElementSibling.className === 'mt-2 cancel') {
            this.nextElementSibling.remove();
        }
    })
})       