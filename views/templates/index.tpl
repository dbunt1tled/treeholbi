{* Smarty *}
{function name=tree parent_id=0}
    {if $data[$parent_id]|@sizeof > 0}
        <ul>
            {foreach $data[$parent_id] as $child_id}
                <li>{$child_id.name} #{$child_id.id}
                    {call name=tree parent_id=$child_id.id}
                </li>
            {/foreach}
        </ul>
    {/if}
{/function}
{call name=tree data=$itemsArray}