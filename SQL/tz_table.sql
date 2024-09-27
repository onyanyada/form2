CREATE TABLE tz_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    form2_id INT NOT NULL,               -- form2_tableとの関連
    timeZone VARCHAR(50) NOT NULL,      -- 時間帯（例：'月朝', '火夕方'など）
    FOREIGN KEY (form2_id) REFERENCES form2_table(id) ON DELETE CASCADE
    --form2_table が親テーブル。紐づけて自動で削除
);
