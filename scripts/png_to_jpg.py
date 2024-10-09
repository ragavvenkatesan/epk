""" Converts all png to jpg and shrink to 1920
"""

import os
import cv2
import sys
import glob
from tqdm import tqdm
import os

MAX_SIZE = 1920

img_files = [
    os.path.join(dp, f)
    for dp, dn, filenames in os.walk(sys.argv[1])
    for f in filenames
    if os.path.splitext(f)[1].lower() == ".jpg"
    or os.path.splitext(f)[1].lower() == ".png"
]

for img_file in tqdm(img_files):
    img = cv2.imread(img_file)

    img_updated = False
    if max(img.shape) > MAX_SIZE:
        img = cv2.resize(
            img,
            (
                round(MAX_SIZE / max(img.shape) * img.shape[1]),
                round(MAX_SIZE / max(img.shape) * img.shape[0]),
            ),
        )
        img_updated = True

    new_file_name = os.path.splitext(img_file)[0] + ".jpg"

    if new_file_name != img_file or img_updated:
        os.remove(img_file)
        cv2.imwrite(new_file_name, img)
