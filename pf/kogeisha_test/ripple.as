class ripple extends MovieClip {
	var max_size:Number; //最大サイズ
	//──────────────────────────────────
	//コンストラクタ
	//──────────────────────────────────
	function ripple (){
		this.onEnterFrame = function(){
			this._width = this._height += max_size / 30; //大きくなるスピードは最大サイズに合わせて変化
			if (this._width > max_size){ this.removeMovieClip(); } //設定した最大サイズに達したら自分を削除
		}
	}
}