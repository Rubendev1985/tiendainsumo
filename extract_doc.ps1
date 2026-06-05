$docxFile = Get-ChildItem -Path "c:\laragon\www\tiendainsumo" -Filter "*.docx" -Recurse | Select-Object -First 1
if (-not $docxFile) {
    Write-Output "Error: No docx file found in the project."
    exit
}
$path = $docxFile.FullName
$tempDir = Join-Path $env:TEMP (New-Guid).ToString()
Add-Type -AssemblyName System.IO.Compression.FileSystem
[System.IO.Compression.ZipFile]::ExtractToDirectory($path, $tempDir)
$xmlPath = Join-Path $tempDir "word/document.xml"
$outputText = @()
if (Test-Path $xmlPath) {
    [xml]$xml = Get-Content $xmlPath -Raw -Encoding Utf8
    $ns = New-Object System.Xml.XmlNamespaceManager($xml.NameTable)
    $ns.AddNamespace("w", "http://schemas.openxmlformats.org/wordprocessingml/2006/main")
    $paragraphs = $xml.SelectNodes("//w:p", $ns)
    foreach ($p in $paragraphs) {
        $text = ""
        $runs = $p.SelectNodes(".//w:t", $ns)
        foreach ($r in $runs) {
            $text += $r.InnerText
        }
        if ($text.Trim() -ne "") {
            $outputText += $text
        }
    }
    $outputPath = "c:\laragon\www\tiendainsumo\SRS_extracted.txt"
    $outputText | Out-File -FilePath $outputPath -Encoding utf8
    Write-Output "Success: File saved to $outputPath"
} else {
    Write-Output "Error: word/document.xml not found."
}
Remove-Item -Path $tempDir -Recurse -Force


