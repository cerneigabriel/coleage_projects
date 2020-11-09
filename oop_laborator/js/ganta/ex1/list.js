class List {
    constructor() {
        this.list = [];
    }

    add = item => this.list.push(item);
    get = key => this.list[key];
    all = () => this.list;
    remove = key => this.list = this.list.filter((item, index) => (index !== key));

    getAverage(col) {
        return parseInt(this.list.reduce((prev, item) => prev + item[col], 0) / this.list.length);
    }

    getByBirthMonth(month) {
        return this.list.filter(item => {
            var date = item.birthdate.split("-");
            date = new Date(date[0], date[1], date[2]);
            return date.getMonth() === month;
        });
    }
}