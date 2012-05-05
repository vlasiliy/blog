<h1>Pages List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Title</th>
      <th>Content</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pages as $page): ?>
    <tr>
      <td><a href="<?php echo url_for('page/show?id='.$page->getId()) ?>"><?php echo $page->getId() ?></a></td>
      <td><?php echo $page->getName() ?></td>
      <td><?php echo $page->getTitle() ?></td>
      <td><?php echo $page->getContent() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('page/new') ?>">New</a>
