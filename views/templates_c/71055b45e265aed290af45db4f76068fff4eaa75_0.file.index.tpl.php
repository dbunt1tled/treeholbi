<?php
/* Smarty version 3.1.30, created on 2017-07-02 13:37:12
  from "D:\OpenServer\domains\holbi.local\views\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5958ccd86db821_46243551',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '71055b45e265aed290af45db4f76068fff4eaa75' => 
    array (
      0 => 'D:\\OpenServer\\domains\\holbi.local\\views\\templates\\index.tpl',
      1 => 1498991616,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5958ccd86db821_46243551 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'tree' => 
  array (
    'compiled_filepath' => 'D:\\OpenServer\\domains\\holbi.local\\views\\templates_c\\71055b45e265aed290af45db4f76068fff4eaa75_0.file.index.tpl.php',
    'uid' => '71055b45e265aed290af45db4f76068fff4eaa75',
    'call_name' => 'smarty_template_function_tree_4870972195958ccd868ed48_32482416',
  ),
));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Building a recursive tree</title>
</head>
<body>
    <div style="text-align: center">
        
        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'tree', array('data'=>$_smarty_tpl->tpl_vars['itemsArray']->value), true);?>

    </div>
</body>
</html><?php }
/* smarty_template_function_tree_4870972195958ccd868ed48_32482416 */
if (!function_exists('smarty_template_function_tree_4870972195958ccd868ed48_32482416')) {
function smarty_template_function_tree_4870972195958ccd868ed48_32482416($_smarty_tpl,$params) {
$params = array_merge(array('parent_id'=>0), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
            <?php if (sizeof($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['parent_id']->value]) > 0) {?>
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['parent_id']->value], 'child_id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child_id']->value) {
?>
                        <li><?php echo $_smarty_tpl->tpl_vars['child_id']->value['name'];?>
 #<?php echo $_smarty_tpl->tpl_vars['child_id']->value['id'];?>

                            <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'tree', array('parent_id'=>$_smarty_tpl->tpl_vars['child_id']->value['id']), true);?>

                        </li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </ul>
            <?php }?>
        <?php
}}
/*/ smarty_template_function_tree_4870972195958ccd868ed48_32482416 */
}
