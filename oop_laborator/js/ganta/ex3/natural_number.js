class NaturalNumber {
    constructor(number, withZero) {
        if ((withZero && number < 0) || (!withZero && number <= 0)) return "Nu corespunde formatului prestabilit";
        this.number = number;
    }

    getDigits() {
        return `${this.number}`.split("");
    }

    getDigitsCount() {
        return this.getDigits().length;
    }

    getDigitByIndex(index) {
        return this.getDigitsCount() > index ? parseInt(this.getDigits()[index]) : false;
    }

    isEven() {
        return this.number % 2 === 0;
    }

    findDigit(digit) {
        return this.getDigits().find(item => (parseInt(item) === digit));
    }
}