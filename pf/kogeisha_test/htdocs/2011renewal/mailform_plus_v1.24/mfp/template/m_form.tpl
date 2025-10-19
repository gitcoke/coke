<form method="post" action="{$config.form_url}">
<dl>
<dl class="dl-tb">
<dt>
<label for="name">名前</label>
<span class="requires">*</span>
</dt>
<dd>
<!--if:$error.name--><span style="color:red;display:block">{$error.name}</span><!--endif:$error.name-->
<input name="name" id="name" type="text" value="{$data.name}" class="text" istyle="1" />
</dd>
<dt>
<label for="furigana">ふりがな</label>
<span class="requires">*</span>
</dt>
<dd>
<!--if:$error.furigana--><span style="color:red;display:block">{$error.furigana}</span><!--endif:$error.furigana-->
<input name="furigana" id="furigana" type="text" class="text" value="{$data.furigana}" istyle="1" />
</dd>
<dt>
<label for="email">メールアドレス</label>
<span class="requires">*</span>
</dt>
<dd>
<!--if:$error.email--><span style="color:red;display:block">{$error.email}</span><!--endif:$error.email-->
<input name="email" id="email" type="text" class="text" value="{$data.email}" istyle="3" />
</dd>
<dt>
<label for="subject">お問い合わせ種類</label>
<span class="requires">*</span>
</dt>
<dd>
<!--if:$error.subject--><span style="color:red;display:block">{$error.subject}</span><!--endif:$error.subject-->
<select name="subject" id="subject">
<option value="">選択してください</option>
<option value="お問い合わせ"<?=($this->assign['data']['subject'] == 'お問い合わせ' ? ' selected="selected"' : '');?>>お問い合わせ</option>
<option value="資料請求"<?=($this->assign['data']['subject'] == '資料請求' ? ' selected="selected"' : '');?>>資料請求</option>
<option value="クレーム"<?=($this->assign['data']['subject'] == 'クレーム' ? ' selected="selected"' : '');?>>クレーム</option>
</select>
</dd>
<dt>
<label for="body">お問い合わせ内容</label>
<span class="requires">*</span>
</dt>
<dd>
<!--if:$error.body--><span style="color:red;display:block">{$error.body}</span><!--endif:$error.body-->
<textarea name="body" id="body" class="text" cols="" rows="" istyle="1">{$data.body}</textarea>
</dd>
<dt>
好きな飲み物は？<br />複数回答可
</dt>
<dd>
<!--if:$error.drink--><span style="color:red;display:block">{$error.drink}</span><!--endif:$error.drink-->
<input type="checkbox" name="drink[]" id="water" value="水"<?=(inArray('水', $this->assign['data']['drink']) ? ' checked="checked"' : '');?> /><label for="water">水</label><br />
<input type="checkbox" name="drink[]" id="tea" value="お茶"<?=(inArray('お茶', $this->assign['data']['drink']) ? ' checked="checked"' : '');?> /><label for="tea">お茶</label><br />
<input type="checkbox" name="drink[]" id="spark" value="炭酸飲料"<?=(inArray('炭酸飲料', $this->assign['data']['drink']) ? ' checked="checked"' : '');?> /><label for="spark">炭酸飲料</label><br />
<input type="checkbox" name="drink[]" id="coffee" value="コーヒー"<?=(inArray('コーヒー', $this->assign['data']['drink']) ? ' checked="checked"' : '');?> /><label for="coffee">コーヒー</label><br />
<input type="checkbox" name="drink[]" id="other" value="その他"<?=(inArray('その他', $this->assign['data']['drink']) ? ' checked="checked"' : '');?> /><label for="other">その他</label>
</dd>
</dl>
<p id="submit">
<!--if:$error.host--><span style="color:red;display:block">{$error.host}</span><!--endif:$error.host-->
<input type="hidden" name="{$config.sn}" value="{$config.si}" />
<input type="submit" name="reset" value="リセット" />
<input type="submit" name="confirm" value="確認" />
</p>
</form>