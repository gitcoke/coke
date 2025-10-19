function smartOver() {
    smartRollover('rollover');  //ロールオーバーを適用させたい箇所のIDを指定
}
function smartRollover(idName) {
    if (!document.getElementById(idName)) { return false; }
    if(document.getElementsByTagName) {
        var images = document.getElementById(idName).getElementsByTagName("img");
        for(var i=0; i < images.length; i++) {
 
            if(images[i].getAttribute("src").match(/_off\./))
            {
            fileName = new Array(images[i].getAttribute("src").replace("_off.", "_on."));
            preImages = new Array();
            for (j=0; j<fileName.length; j++)
            {
                preImages[j] = new Image();
                preImages[j].src = fileName[j];     //「_on」の画像をプリロード
            }
 
                images[i].onmouseover = function() {
                    this.setAttribute("src", this.getAttribute("src").replace("_off.", "_on."));    //マウスオーバーで_off→_on
                }
                images[i].onmouseout = function() {
                    this.setAttribute("src", this.getAttribute("src").replace("_on.", "_off."));    //マウスが離れたら_on→_off
                }
            }
        }
    }
}
 
if(window.addEventListener) {
    window.addEventListener("load", smartOver, false);  //実行
}
else if(window.attachEvent) {
    window.attachEvent("onload", smartOver);
}
else{
    window.onload = smartOver;
}