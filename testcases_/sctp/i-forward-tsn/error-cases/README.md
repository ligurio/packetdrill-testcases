# Status of the I-FORWARD-TSN Error Cases

| Name                                                                           | Implemented | Finalized FreeBSD | Finalized Linux |
|:------------------------------------------------------------------------------:|:-----------:|:-----------------:|:---------------:|
| [i-forward-tsn-tlv-too-long](i-forward-tsn-tlv-too-long.pkt)                   | Yes         | Yes               | -               |
| [i-forward-tsn-tlv-too-short](i-forward-tsn-tlv-too-short.pkt)                 | Yes         | Yes (Note 1)      | -               |
| [i-forward-tsn-too-short](i-forward-tsn-too-short.pkt)                         | Yes         | Yes               | -               |

# Notes
1. packetdrill crashes with error message `packetdrill: sctp_iterator.c:81: sctp_chunks_next: Assertion chunk_length >= sizeof(struct sctp_chunk)' failed.`

