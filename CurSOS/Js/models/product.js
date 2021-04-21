var Product = function(name, detail, price) {
    this.id = 0;
    this.name = name;
    this.detail = detail;
    this.price = price;
};
Product.prototype = {
    setId: function(id) {
        this.id = id;
    },
    getHtml: function() {
        var html = "<div class='product'>";
        html += "<p>" + this.name + "</p>";
        html += "<p>" + this.detail + "</p>";
        html += "<p>$" + this.price + "</p>";
        html += "<button class='btnDelete'>Borrar</button>";
        html += "</div>";
        return html;
    },
    isValid: function() {
        if (!this.name || !this.detail || !this.price) return false;
        return true;
    }
};