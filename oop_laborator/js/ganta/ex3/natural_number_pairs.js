class NaturalNumberPairs extends NaturalNumber {
    constructor(number) {
        super(number);
    }

    numbersIntersection(secondNum) {
        secondNum = new NaturalNumberPairs(secondNum);

        return super.getDigits().filter(value => secondNum.getDigits().includes(value)).map(item => (parseInt(item)));
    }
}