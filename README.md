# Vulnerable Docker Lab

A small, self-contained Docker-based vulnerability lab that simulates a café landing page and an isolated internal microservice for CTF/Pentest practice.

## Machine Information

* **Difficulty:** Medium
* **Vulnerability Categories:** Command Injection, Network Pivoting, SUID Privilege Escalation.

**CafeLocal** is a medium-difficulty CTF lab that exploits a **Command Injection** vulnerability within a product image upload feature to achieve Remote Code Execution (RCE) as `www-data`. From there, the attacker must perform **Network Pivoting** into an isolated internal subnet to exfiltrate an **SSH Private Key** from IP `172.20.0.20`. This key allows them to log in via SSH (Port 2222) and elevate privileges directly to `root` via a misconfigured **SUID** flag on the `find` binary.

---
## How to run

From the repository root, start the services with Docker Compose:

```bash
sudo docker-compose up --build -d
```

Add hostnames to your `/etc/hosts` file:

```text
127.0.0.1 48daklao.local app.48daklao.local
```

Open the browser to access the web service on port `80`:

- `http://48daklao.local`

## Cleanup

To stop and remove containers:

```bash
sudo docker compose down
```
