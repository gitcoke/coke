
<dl>
<dt>�����O</dt>
<dd>{$data.name}</dd>
<dt>�ӂ肪��</dt>
<dd>{$data.furigana}</dd>
<dt>���[���A�h���X</dt>
<dd>{$data.email}</dd>
<dt>���₢���킹���</dt>
<dd>{$data.subject}</dd>
<dt>���₢���킹���e</dt>
<dd>{nl2br|$data.body}</dd>
<dt>�D���Ȉ��ݕ��́H</dt>
<dd>{implode|$data.drink}</dd>
</dl>
<div id="submit">
<form method="post" action="{$config.form_url}">
<p>
<input type="hidden" name="{$config.sn}" value="{$config.si}" />
<input type="submit" name="edit" value="�C��" />
<input type="submit" name="send" value="���M" />
</p>
</form>
</div><!-- submit -->