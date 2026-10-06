"""Copy the reviewed bilingual hooks into the existing ob_site module."""
from pathlib import Path

source = Path(__file__).parent / "bilingual.module.inc"
module = Path(__file__).resolve().parents[5] / "modules/custom/ob_site"
if not module.is_dir():
    raise RuntimeError(f"Module directory not found: {module}")
target = module / "includes/bilingual.module.inc"
target.write_text(source.read_text())
entry = module / "ob_site.module"
include = "require_once __DIR__ . '/includes/bilingual.module.inc';"
text = entry.read_text()
if include not in text:
    entry.write_text(text.rstrip() + "\n\n" + include + "\n")
print("Installed bilingual Views hooks in ob_site.")
