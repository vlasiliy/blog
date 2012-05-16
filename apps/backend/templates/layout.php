
<html>
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body bottommargin=0 topmargin=0 leftmargin=0 rightmargin=0>

  <div id="topmenu">

    <table align="center" border=0 сellpadding=0 cellspacing=0 width="100%" style="border-top: solid 1px #ffffff;margin:0;">
      <tr>
        <td class="noborder" align="center">&nbsp;</td>
        <td class="noborder" width=85 height=32 align="center" style="background-image: url(/pict/posts.png);background-repeat:no-repeat;">
            <a href="<?php echo url_for('@post') ?>" style="padding: 10px 0 10px 35px;">посты</a>
        </td>
        <td class="noborder" align="center" width=20><img src="/pict/vertline.gif"></td>
        <td class="noborder" width=100 height=32 align="center" style="background-image: url(/pict/pages.png);background-repeat:no-repeat;">
          <a href="<?php echo url_for('@page') ?>" style="padding: 10px 0 10px 35px;">страинцы</a>
        </td>
        <td class="noborder" align="center" width=20><img src="/pict/vertline.gif"></td>
        <td class="noborder" width=90 height=32 align="center" style="background-image: url(/pict/users.png);background-repeat:no-repeat;">
          <a href="<?php echo url_for('@homepage') ?>" style="padding: 10px 0 10px 35px;">юзеры</a>
        </td>
        <td class="noborder" align="center" width=20><img src="/pict/vertline.gif"></td>
        <td class="noborder" width=85 height=32 align="center" style="background-image: url(/pict/exit.png);background-repeat:no-repeat;">
          <a href="/admin/exit" style="padding: 10px 0 10px 35px;">выход</a>
        </td>
        <td class="noborder" align="center">&nbsp;</td>
      </tr>  
    </table>
    
  </div>
  <div id="divspace"></div>
  <div id="content">
      
    <?php echo $sf_content ?>
      
  </div>

  </body>
</html>
