# Handling of TCP Segments with the SYN-FIN-bits Set in the LISTEN state

## Description
This set of tests focuses on the handling of SYN-FIN-segments in the LISTEN state.
A SYN-ACK segments should be sent.

The required behavior is described in [RFC 0793](https://tools.ietf.org/html/rfc793#section-3.9).

In FreeBSD, the `sysctl`-variable `net.inet.tcp.drop_synfin` can be used to
select that received SYN-FIN-segments are just dropped.
The default is to not drop SYN-FIN-segments.

## Results

| Name                                                                                                                                                                                                                             | Result FreeBSD 11.0 | Result FreeBSD Head |
|:---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|:-------------------:|:-------------------:|
|[rcv-syn-fin-without-data-listen-dropping-disabled-ipv4](rcv-syn-fin-without-data-listen-dropping-disabled-ipv4.pkt "Ensure that the reception of a SYN-FIN-segment in the LISTEN state does trigger the sending of a SYN-ACK-segment")   | Unknown             | Passed              |
|[rcv-syn-fin-without-data-listen-dropping-disabled-ipv6](rcv-syn-fin-without-data-listen-dropping-disabled-ipv6.pkt "Ensure that the reception of a SYN-FIN-segment in the LISTEN state does trigger the sending of a SYN-ACK-segment")   | Unknown             | Passed              |
|[rcv-syn-fin-with-data-listen-dropping-disabled-ipv4](rcv-syn-fin-with-data-listen-dropping-disabled-ipv4.pkt "Ensure that the reception of a SYN-FIN-segment in the LISTEN state does trigger the sending of a SYN-ACK-segment")         | Unknown             | Passed              |
|[rcv-syn-fin-with-data-listen-dropping-disabled-ipv6](rcv-syn-fin-with-data-listen-dropping-disabled-ipv6.pkt "Ensure that the reception of a SYN-FIN-segment in the LISTEN state does trigger the sending of a SYN-ACK-segment")         | Unknown             | Passed              |
|[rcv-syn-fin-without-data-listen-dropping-enabled-ipv4](rcv-syn-fin-without-data-listen-dropping-enabled-ipv4.pkt "Ensure that the reception of a SYN-FIN-segment in the LISTEN state does not trigger the sending of a SYN-ACK-segment") | Unknown             | Passed              |
|[rcv-syn-fin-without-data-listen-dropping-enabled-ipv6](rcv-syn-fin-without-data-listen-dropping-enabled-ipv6.pkt "Ensure that the reception of a SYN-FIN-segment in the LISTEN state does not trigger the sending of a SYN-ACK-segment") | Unknown             | Passed              |
|[rcv-syn-fin-with-data-listen-dropping-enabled-ipv4](rcv-syn-fin-with-data-listen-dropping-enabled-ipv4.pkt "Ensure that the reception of a SYN-FIN-segment in the LISTEN state does not trigger the sending of a SYN-ACK-segment")       | Unknown             | Passed              |
|[rcv-syn-fin-with-data-listen-dropping-enabled-ipv6](rcv-syn-fin-with-data-listen-dropping-enabled-ipv6.pkt "Ensure that the reception of a SYN-FIN-segment in the LISTEN state does not trigger the sending of a SYN-ACK-segment")       | Unknown             | Passed              |
