<form method="post" action="{$config.form_url}">
<dl>
<dl class="dl-tb">
<dt>
<label for="name">���O</label>
<span class="requires">*</span>
</dt>
<dd>
<!--if:$error.name--><span style="color:red;display:block">{$error.name}</span><!--endif:$error.name-->
<input name="name" id="name" type="text" value="{$data.name}" class="text" istyle="1" />
</dd>
<dt>
<label for="furigana">�ӂ肪��</label>
<span class="requires">*</span>
</dt>
<dd>
<!--if:$error.furigana--><span style="color:red;display:block">{$error.furigana}</span><!--endif:$error.furigana-->
<input name="furigana" id="furigana" type="text" class="text" value="{$data.furigana}" istyle="1" />
</dd>
<dt>
<label for="email">���[���A�h���X</label>
<span class="requires">*</span>
</dt>
<dd>
<!--if:$error.email--><span style="color:red;display:block">{$error.email}</span><!--endif:$error.email-->
<input name="email" id="email" type="text" class="text" value="{$data.email}" istyle="3" />
</dd>
<dt>
<label for="subject">���₢���킹���</label>
<span class="requires">*</span>
</dt>
<dd>
<!--if:$error.subject--><span style="color:red;display:block">{$error.subject}</span><!--endif:$error.subject-->
<select name="subject" id="subject">
<option value="">�I�����Ă�������</option>
<option value="���₢���킹"<?=($this->assign['data']['subject'] == '���₢���킹' ? ' selected="selected"' : '');?>>���₢���킹</option>
<option value="��������"<?=($this->assign['data']['subject'] == '��������' ? ' selected="selected"' : '');?>>��������</option>
<option value="�N���[��"<?=($this->assign['data']['subject'] == '�N���[��' ? ' selected="selected"' : '');?>>�N���[��</option>
</select>
</dd>
<dt>
<label for="body">���₢���킹���e</label>
<span class="requires">*</span>
</dt>
<dd>
<!--if:$error.body--><span style="color:red;display:block">{$error.body}</span><!--endif:$error.body-->
<textarea name="body" id="body" class="text" cols="" rows="" istyle="1">{$data.body}</textarea>
</dd>
<dt>
�D���Ȉ��ݕ��́H<br />�����񓚉�
</dt>
<dd>
<!--if:$error.drink--><span style="color:red;display:block">{$error.drink}</span><!--endif:$error.drink-->
<input type="checkbox" name="drink[]" id="water" value="��"<?=(inArray('��', $this->assign['data']['drink']) ? ' checked="checked"' : '');?> /><label for="water">��</label><br />
<input type="checkbox" name="drink[]" id="tea" value="����"<?=(inArray('����', $this->assign['data']['drink']) ? ' checked="checked"' : '');?> /><label for="tea">����</label><br />
<input type="checkbox" name="drink[]" id="spark" value="�Y�_����"<?=(inArray('�Y�_����', $this->assign['data']['drink']) ? ' checked="checked"' : '');?> /><label for="spark">�Y�_����</label><br />
<input type="checkbox" name="drink[]" id="coffee" value="�R�[�q�["<?=(inArray('�R�[�q�[', $this->assign['data']['drink']) ? ' checked="checked"' : '');?> /><label for="coffee">�R�[�q�[</label><br />
<input type="checkbox" name="drink[]" id="other" value="���̑�"<?=(inArray('���̑�', $this->assign['data']['drink']) ? ' checked="checked"' : '');?> /><label for="other">���̑�</label>
</dd>
</dl>
<p id="submit">
<!--if:$error.host--><span style="color:red;display:block">{$error.host}</span><!--endif:$error.host-->
<input type="hidden" name="{$config.sn}" value="{$config.si}" />
<input type="submit" name="reset" value="���Z�b�g" />
<input type="submit" name="confirm" value="�m�F" />
</p>
</form>