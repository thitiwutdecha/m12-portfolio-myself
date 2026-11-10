# Module 12 — Student Lab Guide

## Before you begin
Use the instructor-provided AWS Academy Learner Lab. Work with your team's repository when appropriate. Do not commit key-pair `.pem` files, credentials, or personal data. Costs and instance availability depend on the lab settings; stop instances when instructed.

## Part A — GitHub Pages (static hosting)
1. Open `portfolio/index.html` locally. Change the name and click **Create Portfolio**. Refresh the page and verify the data restores.
2. Create a **public demo-only repository** (or use the instructor-specified repo); copy the contents of `portfolio/` into its root. Keep `index.html`, `app.js`, and `style.css` together.
3. Push to GitHub. In repository **Settings → Pages**, select the repository's branch/folder publishing option provided by GitHub, and publish.
4. Open the Pages URL on another device/browser. Does your saved name appear there? Record why or why not.

**Evidence A:** GitHub Pages URL, screenshot, and one sentence about localStorage.

## Part B — EC2 and Apache (no backend yet)
1. In AWS Academy Learner Lab, start the lab and launch the AWS Console.
2. Launch a small **Ubuntu** EC2 instance permitted by your lab. Name it `CS100-portfolio`.
3. Use a key pair that you can securely store, or EC2 Instance Connect if supported. Ensure a public IPv4 address is available.
4. Configure inbound Security Group rules: **HTTP TCP 80 from the internet** for a public demonstration; **SSH TCP 22 only from your IP** when SSH is needed. Never open SSH to everyone just for convenience. Confirm your instructor's rules.
5. Connect to your server and install Apache:

```bash
sudo apt update
sudo apt install -y apache2
sudo systemctl enable --now apache2
sudo systemctl status apache2 --no-pager
```

6. Open `http://<EC2-PUBLIC-IP>/` in a browser. You should see Apache's default page.
7. Upload the **contents** of `portfolio/` to `/var/www/html/` on EC2 using your team's approved approach (Git clone then copy, SFTP, or `scp`). For example, if your files are already inside the EC2 user's home folder:

```bash
sudo cp -r ~/portfolio/. /var/www/html/
sudo chown -R root:root /var/www/html
```

8. Open `http://<EC2-PUBLIC-IP>/` and verify the Power Up! Portfolio works. Refresh and test from a second browser/device.

**Evidence B:** EC2 public URL, Apache installation screenshot, and working Portfolio screenshot. Your EC2 IP may change after stopping/starting an instance.

**Important security note:** HTTP on port 80 is unencrypted; use **demo data only**, not real credentials or sensitive information. A production site should use HTTPS.

## Part C — Why a server-side language?
With the Portfolio on EC2, one browser may show a saved profile while another browser shows the default profile. Describe where `localStorage` data resides and why deploying to EC2 alone does not centralize it.

## Part D — Add PHP, receive GET and POST
On the **same EC2 instance**:

```bash
sudo apt update
sudo apt install -y php libapache2-mod-php
php -v
sudo systemctl restart apache2
```

Upload `php_form/form.html` and `php_form/receive.php` to a subfolder of the Apache document root (`/var/www/html/php_form/`). Create the folder first if needed:

```bash
sudo mkdir -p /var/www/html/php_form
# Copy your php_form files into that directory using your approved transfer method
```

Visit `http://<EC2-PUBLIC-IP>/php_form/form.html` and try both forms.

1. Before completing the TODOs, what name appears on the receiver page?
2. In `receive.php`, set `$name` from `$_GET['displayName']` when the request method is GET and from `$_POST['displayName']` when it is POST. Use `?? ''` as the default.
3. Apply `trim()` to `$name` before output. The supplied `htmlspecialchars()` call safely encodes text for this HTML display.
4. Re-upload `receive.php` and test GET and POST. Inspect **DevTools → Network** and compare URL query parameters versus POST request body.
5. Does this PHP code **save** the Portfolio? Explain.

**Evidence D:** GET URL showing query string, POST Network request details, and the PHP receiver output. Never send passwords or sensitive information in this classroom HTTP demo.

## Finish checklist
- [ ] GitHub Pages opens the existing Portfolio
- [ ] Apache serves the same Portfolio from EC2
- [ ] I can explain why localStorage is not shared between browsers
- [ ] PHP receives the Display Name via GET
- [ ] PHP receives the Display Name via POST
- [ ] I understand that PHP form reception is not yet server-side persistence

### Instructor transition to Module 13
How do we validate more than one field and save a Portfolio as a JSON file on the server, so other devices can retrieve it?
