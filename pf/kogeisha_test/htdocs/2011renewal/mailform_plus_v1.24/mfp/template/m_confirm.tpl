
<dl>
<dt>お名前</dt>
<dd>{$data.name}</dd>
<dt>ふりがな</dt>
<dd>{$data.furigana}</dd>
<dt>メールアドレス</dt>
<dd>{$data.email}</dd>
<dt>お問い合わせ種類</dt>
<dd>{$data.subject}</dd>
<dt>お問い合わせ内容</dt>
<dd>{nl2br|$data.body}</dd>
<dt>好きな飲み物は？</dt>
<dd>{implode|$data.drink}</dd>
</dl>
<div id="submit">
<form method="post" action="{$config.form_url}">
<p>
<input type="hidden" name="{$config.sn}" value="{$config.si}" />
<input type="submit" name="edit" value="修正" />
<input type="submit" name="send" value="送信" />
</p>
</form>
</div><!-- submit -->