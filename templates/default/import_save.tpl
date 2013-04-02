<a href="{url o=$smarty.const.OBJ m='admin'}" > << BACK </a>
{foreach from=$msg item=msg_item}
	<div>{$msg_item.msg}</div>
{/foreach}