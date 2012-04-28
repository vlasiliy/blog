<?php use_helper('I18N') ?>

<div class="article">
    <h2>Регистрация</h2>
    <form action="<?php echo url_for('@sf_guard_register') ?>" method="post">
        <table id="tbl_register">
            <?php echo $form ?>
            <tfoot>
                <tr>
                    <td colspan="2">
                    <input type="submit" name="register" value="<?php echo __('Register', null, 'sf_guard') ?>" />
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</div>