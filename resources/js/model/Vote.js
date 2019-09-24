import Option from "./Option";

class Vote {

    constructor(vote) {
        this.id = vote.id;
        this.subject = vote.subject;
        this.order = vote.order;
        this.tmp_count = vote.tmp_count;
        this.hasUserVoted = vote.hasUserVoted;
        this.action = vote.action;
        this.mostSelectedOptionCoun = vote.mostSelectedOptionCount;
        this.setOptions(vote.options);
    }

    setOptions(options) {
        this.options = options.map(o => new Option(o));
    }

    title() {
        return this.subject;
    }

    count() {
        return this.tmp_count;
    }
}

export default Vote;
