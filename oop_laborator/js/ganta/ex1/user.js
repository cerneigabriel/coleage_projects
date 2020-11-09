class User {
    constructor(name, surname, birthdate) {
        this.name = name;
        this.surname = surname;
        this.birthdate = birthdate;
        this.age = this.getAge(this.birthdate);
    }

    getAge(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }
}