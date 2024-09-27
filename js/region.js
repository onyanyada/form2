let tokyo = regionData.filter(item => item == "tokyo").length;
let saitama = regionData.filter(item => item == "saitama").length;
let kanagawa = regionData.filter(item => item == "kanagawa").length;
let chiba = regionData.filter(item => item == "chiba").length;


const regionCount = {
    "tokyo": tokyo,
    "saitama": saitama,
    "kanagawa": kanagawa,
    "chiba": chiba,
};


$(document).ready(function () {
    $('#map').jmap();


    $('#map').jmap({
        height: "450px",
        skew: '10',
        showHeatmap: true,
        heatmapLabelUnit: '人',
        heatmapConditions: ["=0", ">=1", ">=2"], // 色がマッチする条件
        heatmapColors: ["#BFC7CE", "#FAE1E1", "#F19898"],
        showHeatlabel: true,
        onSelect: function (e, data) {
            alert('ユーザー：%d 人です。'.replace('%d', (data.option.number).toLocaleString()));
        },
        areas: [
            { code: 1, name: "北海道", number: 1278 },
            { code: 2, name: "青森", number: 1278 },
            { code: 3, name: "岩手", number: 1255 },
            { code: 4, name: "宮城", number: 2323 },
            { code: 5, name: "秋田", number: 996 },
            { code: 6, name: "山形", number: 1102 },
            { code: 7, name: "福島", number: 1882 },
            { code: 8, name: "茨城", number: 2892 },
            { code: 9, name: "栃木", number: 1957 },
            { code: 10, name: "群馬", number: 1960 },
            { code: 11, name: "埼玉", number: saitama },
            { code: 12, name: "千葉", number: chiba },
            { code: 13, name: "東京", number: tokyo },
            { code: 14, name: "神奈川", number: kanagawa },
            { code: 15, name: "新潟", number: 2267 },
            { code: 16, name: "富山", number: 1056 },
            { code: 17, name: "石川", number: 1147 },
            { code: 18, name: "福井", number: 779 },
            { code: 19, name: "山梨", number: 823 },
            { code: 20, name: "長野", number: 2076 },
            { code: 21, name: "岐阜", number: 2008 },
            { code: 22, name: "静岡", number: 3675 },
            { code: 23, name: "愛知", number: 7525 },
            { code: 24, name: "三重", number: 1800 },
            { code: 25, name: "滋賀", number: 1413 },
            { code: 26, name: "京都", number: 2599 },
            { code: 27, name: "大阪", number: 8823 },
            { code: 28, name: "兵庫", number: 5503 },
            { code: 29, name: "奈良", number: 1348 },
            { code: 30, name: "和歌山", number: 945 },
            { code: 31, name: "鳥取", number: 565 },
            { code: 32, name: "島根", number: 685 },
            { code: 33, name: "岡山", number: 1907 },
            { code: 34, name: "広島", number: 2829 },
            { code: 35, name: "山口", number: 1383 },
            { code: 36, name: "徳島", number: 743 },
            { code: 37, name: "香川", number: 967 },
            { code: 38, name: "愛媛", number: 1364 },
            { code: 39, name: "高知", number: 714 },
            { code: 40, name: "福岡", number: 5107 },
            { code: 41, name: "佐賀", number: 824 },
            { code: 42, name: "長崎", number: 1354 },
            { code: 43, name: "熊本", number: 1765 },
            { code: 44, name: "大分", number: 1152 },
            { code: 45, name: "宮崎", number: 1089 },
            { code: 46, name: "鹿児島", number: 1626 },
            { code: 47, name: "沖縄", number: 1443 }
        ]
    });

});