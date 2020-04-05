class Option {
    constructor(option) {
        this.id = option.id;
        this.title = option.title;
        this.order = option.order;
        this.tmp_count = option.tmp_count;
        this.ratio = option.ratio;
        this.hasUserChosen = option.hasUserChosen;
        this.action = option.action;
    }

    count(){
        return this.tmp_count;
    }

}
export default Option;
