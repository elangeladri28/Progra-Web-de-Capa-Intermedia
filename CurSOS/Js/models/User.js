var User = function(usuario, correo, contraseña, rol) {
    this.id = 0;
    this.usuario = usuario;
    this.correo = correo;
    this.contraseña = contraseña;
    this.rol = rol;
};

var User = function(usuario, correo, contraseña) {
    this.id = 0;
    this.usuario = usuario;
    this.correo = correo;
    this.contraseña = contraseña;
};

User.prototype = {
    setId: function(id) {
        this.id = id;
    },
    isValid: function() {
        if (!this.usuario || !this.correo || !this.contraseña) return false;
        return true;
    }

};