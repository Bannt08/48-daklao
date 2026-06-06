import http.server
import socketserver

PORT = 8080
Handler = http.server.SimpleHTTPRequestHandler

print(f"Dịch vụ sao lưu nội bộ đang chạy tại Port {PORT}...")
with socketserver.TCPServer(("", PORT), Handler) as httpd:
    httpd.serve_forever()