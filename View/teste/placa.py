
import json
import sys

from sinesp_client import SinespClient

sc = SinespClient()
plate = sys.argv[1]
result = sc.search(plate)
json_result = json.dumps(result)
print(json_result)