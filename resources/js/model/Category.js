import Vote from "./Vote";

class Category {
    constructor(category) {
        this.id = category.id;
        this.name = category.name;
        this.display_name = category.display_name;
        this.order = category.order;
        this.action = category.action;
        this.isDefault = category.isDefault;
        this.setVote(category.sorted_votes);
    }

    setVote(votes) {
        this.sorted_votes = votes.map(v => new Vote(v));
    }

    title() {
        return this.display_name;
    }

    voteCount() {
        let result = 0 ;
        this.sorted_votes.map(v => {
            result += v.count();
        });
        return result;
    }

    votes(){
        return this.sorted_votes;
    }

    collapse(){
        this.isDefault = !this.isDefault;
    }
}

export default Category;
