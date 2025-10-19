// 1ページの要素数
const maxItemPerPage = 5;
var app = new Vue({
  el: '#app',
  data: {
    name: '',
    list: [
      {name: 'hanako'}, 
      {name: 'taro'},
      {name: 'john'}, 
      {name: 'punpee'}
     ],
     // ページネーション用
     currentPage: 1
  },
  computed: {
    // 該当ページの要素抽出
    getSmallList() {
    	return this.list.filter((item, index) => {
        return (index < this.currentPage * maxItemPerPage) &&
          (index >= (this.currentPage - 1) * maxItemPerPage);
      });
    },
    isMaxPage() {
    	const maxPage = Math.ceil(this.list.length / maxItemPerPage);
    	return this.currentPage >= maxPage;
    }
  },
  methods: {
    destroy() {
      this.list.pop();
      if (this.list.length % maxItemPerPage === 0) {
      	this.prePage();
      }
    },
    addObj(name) {
      if (this.list.length % maxItemPerPage === 0) {
      	this.nextPage();
      }
      this.list.push({name: name});
      this.name = '';
    },
    nextPage() {
      this.currentPage++;
    },
    prePage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    }
  }
})