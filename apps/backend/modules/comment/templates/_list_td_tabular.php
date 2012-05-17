<td class="sf_admin_text sf_admin_list_td_text">
  <?php echo $comment->getText(ESC_RAW) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($comment->getCreatedAt()) ? format_date($comment->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($comment->getUpdatedAt()) ? format_date($comment->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
