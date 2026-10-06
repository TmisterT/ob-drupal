"""Copy only the bilingual configuration snapshot to Drupal's sync directory."""
from pathlib import Path

source = Path(__file__).parent / "export"
target = Path(__file__).resolve().parents[6] / "config/sync"
if not target.is_dir():
    raise RuntimeError(f"Configuration directory not found: {target}")
files = sorted(source.glob("*.yml"))
if not files:
    raise RuntimeError("Bilingual configuration snapshot is missing")
for entry in files:
    (target / entry.name).write_bytes(entry.read_bytes())
print(f"Saved {len(files)} bilingual configuration files to config/sync.")
