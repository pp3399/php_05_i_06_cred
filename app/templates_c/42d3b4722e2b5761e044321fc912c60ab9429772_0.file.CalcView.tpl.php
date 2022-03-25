<?php
/* Smarty version 4.1.0, created on 2022-03-22 17:23:19
  from 'B:\Documents K\xampp\htdocs\php_06_cred\app\calc\CalcView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6239f7f706dd05_29371643',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42d3b4722e2b5761e044321fc912c60ab9429772' => 
    array (
      0 => 'B:\\Documents K\\xampp\\htdocs\\php_06_cred\\app\\calc\\CalcView.tpl',
      1 => 1647966114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6239f7f706dd05_29371643 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13091146676239f7f70613a4_97280553', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4966218376239f7f7061c15_38880472', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../../templates/main.tpl");
}
/* {block 'footer'} */
class Block_13091146676239f7f70613a4_97280553 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_13091146676239f7f70613a4_97280553',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 PP. All rights reserved. Design: <a href="http://html5up.net">HTML5 UP</a><?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_4966218376239f7f7061c15_38880472 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_4966218376239f7f7061c15_38880472',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <header>
        <h2>Kalkulator kredytowy</h2>
        <p>Wylicz swoją ratę</p>
    </header>


    <div class="row">
        <div class="col-12">

            <!-- Form -->
            <section class="box">

                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute">
                    <div class="row gtr-uniform gtr-50">
                        <div class="col-6 col-12-mobilep">
                            <input type="text" name="amt" id="amt" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->amt;?>
" placeholder="Kwota kredytu" />
                        </div>
                        <div class="col-6 col-12-mobilep">
                            <input type="text" name="yrs" id="yrs" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->yrs;?>
" placeholder="Liczba lat" />
                        </div>
                        <div class="col-6 col-12-mobilep">
                            <input type="text" name="rt" id="rt" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->rt;?>
" placeholder="Oprocentowanie" />
                        </div>



                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" value="Oblicz ratę kredytu" /></li>
                                <li><input class="alt" type="reset" value="Resetuj"  /></li>
                            </ul>
                        </div>
                    </div>
                </form>

                <hr />

            </section>

        </div>
    </div>







    <div class="messages">

                <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
            <h4>Wystąpiły błędy: </h4>
            <ol class="err">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
                    <li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ol>
        <?php }?>


                <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
            <h4>Informacje: </h4>
            <ol class="inf">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
                    <li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ol>
        <?php }?>
 

            <?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
                <h4>Wynik:</h4>
                <p class="res">
                    <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>
 zł
                </p>
            <?php }?>

        </div>

        <?php
}
}
/* {/block 'content'} */
}
