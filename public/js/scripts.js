$(document).ready(function() {
        const phonePattern = /(\+?\d{1,4}[ \-]?\(?\d{2,}\)?[ \-]?\d{3,}[ \-]?\d{4,})/g;

        $('.js-info').html(function(_, html) {
            return html.replace(phonePattern, match => {
                const cleanPhone = match.replace(/[^\d+]/g, '');
                return `<a href="tel:${cleanPhone}" class="phone-link">${match}</a>`;
            });
        });

        $('.filiation-card').on('click', e => {
            if ($(e.target).is('.phone-link')) e.stopPropagation();
        });
    });
