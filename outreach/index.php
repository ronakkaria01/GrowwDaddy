<?php
// Read-only view of the outreach list, behind a shared team password.
// Session only: no cookie survives the browser closing, no remember me.
// Locally: php -S localhost:8000 -t outreach
const OUTREACH_PASSWORD = 'chupacabra@321';

$https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
      || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https');
session_set_cookie_params(['lifetime' => 0, 'httponly' => true, 'secure' => $https, 'samesite' => 'Lax']);
session_start();

header('X-Robots-Tag: noindex, nofollow', true);
$self = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');

if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
    header("Location: $self");
    exit;
}

$error = '';
if (isset($_POST['password'])) {
    // hash_equals so a wrong guess takes the same time as a right one
    if (hash_equals(OUTREACH_PASSWORD, (string) $_POST['password'])) {
        session_regenerate_id(true);      // new id on login, so a fixed one is useless
        $_SESSION['outreach'] = true;
        header("Location: $self");        // redirect after post, refresh will not resubmit
        exit;
    }
    sleep(1);                             // ponytail: crude brake on guessing, rate limit if this ever goes public
    $error = 'Wrong password.';
}

$authed = !empty($_SESSION['outreach']);
if (!$authed) {
    http_response_code(401);              // nothing below this point is rendered
}
?>
<!doctype html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>Outreach<?= $authed ? ' — edtech' : '' ?></title>
<style>
  :root { color-scheme: light dark; }
  body { font: 15px/1.5 system-ui, sans-serif; max-width: 60rem; margin: 2rem auto; padding: 0 1rem; }
  h1 { font-size: 1.25rem; margin-bottom: .25rem; }
  .muted { color: #888; }
  form.login { max-width: 20rem; margin: 15vh auto 0; }
  form.login input { width: 100%; font: inherit; padding: .5rem .6rem; margin: .75rem 0; border: 1px solid #8886; border-radius: .35rem; background: none; color: inherit; }
  form.login button { font: inherit; padding: .5rem 1rem; border: 0; border-radius: .35rem; background: #16a34a; color: #fff; cursor: pointer; }
  .err { color: #dc2626; font-size: .875rem; }
  table { border-collapse: collapse; width: 100%; margin-top: 1.5rem; }
  th, td { text-align: left; padding: .6rem .5rem; border-bottom: 1px solid #8883; vertical-align: top; }
  th { font-size: .75rem; text-transform: uppercase; letter-spacing: .04em; color: #888; }
  button.name { font: inherit; font-weight: 600; background: none; border: 0; padding: 0; cursor: pointer; color: inherit; text-align: left; }
  button.name:hover { text-decoration: underline; }
  .pill { font-size: .75rem; padding: .1rem .5rem; border-radius: 1rem; white-space: nowrap; }
  .yes { background: #16a34a22; color: #16a34a; }
  .no  { background: #8882; color: #888; }
  dialog { max-width: 42rem; width: calc(100% - 2rem); border: 0; border-radius: .5rem; padding: 1.5rem; }
  dialog::backdrop { background: #0009; }
  dialog h2 { font-size: 1rem; margin: 0 0 .25rem; }
  dialog pre { white-space: pre-wrap; font: inherit; margin: 1rem 0 0; padding-top: 1rem; border-top: 1px solid #8883; }
  dialog .close { position: absolute; top: 1rem; right: 1rem; }
</style>

<?php if (!$authed): ?>
<form class="login" method="post">
  <h1>Outreach</h1>
  <p class="muted">Team only.</p>
  <input type="password" name="password" placeholder="Password" autofocus required autocomplete="current-password">
  <button>Open</button>
  <?php if ($error): ?><p class="err"><?= $error ?></p><?php endif; ?>
</form>
<?php exit; endif; ?>

<?php
$d = json_decode(file_get_contents(__DIR__ . '/edtech-prospects.json'), true);
$c = $d['companies'];
$sent = count(array_filter($c, fn($x) => $x['sent']));
?>
<h1>Edtech outreach</h1>
<p class="muted">
  <?= $sent ?> of <?= count($c) ?> sent &middot; from <?= htmlspecialchars($d['meta']['send_from']) ?>
  &middot; <a href="?logout">log out</a>
</p>

<table>
  <tr><th>Company</th><th>Email</th><th>Angle</th><th>Ticket</th><th>Status</th></tr>
  <?php foreach ($c as $i => $x): ?>
  <tr>
    <td><button class="name" onclick="m<?= $i ?>.showModal()"><?= htmlspecialchars($x['name']) ?></button></td>
    <td class="muted"><?= htmlspecialchars($x['email']) ?></td>
    <td class="muted"><?= htmlspecialchars($x['angle']) ?></td>
    <td class="muted"><?= htmlspecialchars($x['ticket_band'] ?? $x['services'] ?? '') ?></td>
    <td><span class="pill <?= $x['sent'] ? 'yes' : 'no' ?>"><?= $x['sent'] ? 'sent' : 'pending' ?></span></td>
  </tr>
  <?php endforeach; ?>
</table>

<?php foreach ($c as $i => $x): ?>
<dialog id="m<?= $i ?>">
  <form method="dialog"><button class="close">&times;</button></form>
  <h2><?= htmlspecialchars($x['name']) ?></h2>
  <p class="muted">
    To: <?= htmlspecialchars($x['email']) ?><br>
    Subject: <?= htmlspecialchars($x['subject']) ?>
  </p>
  <pre><?= htmlspecialchars($x['body']) ?></pre>
</dialog>
<?php endforeach; ?>
